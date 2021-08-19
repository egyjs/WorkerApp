<?php

namespace App\Repositories\User;

use App\Http\Requests\API\User\CreateIssueRequest;
use App\Http\Requests\API\User\StoreIssueRequest;
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\User\IssueInterface;
use App\Models\User\UserAddress;
use App\Models\User\UserIssue;
use App\Models\Worker\Worker;
use App\Traits\ResponseAPI;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IssueRepository implements IssueInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function store(StoreIssueRequest $request){
        $client = $request->user();
        $worker = Worker::with(['jobs'])->find($request->worker_id);
        $job = $worker->jobs->where('id',$request->job_id)->first();

        if (!$worker->isActive() && !$job->pivot->active) return $this->error('sorry.. this worker isn\'t active yet! ');
        // todo: check slots


        // store issue in db
        return DB::transaction(function () use ($request,$client,$worker,$job) {
            $issue = UserIssue::create([
                // relations
                'worker_id'=>$worker->id,
                'user_id' => $client->id,
                'user_address_id'=> $request->user_address_id,
                'job_id'=> $job->id,

                // data
                'date' => Carbon::parse($request->date),
                'time' => $request->time,
                'description'=>$request->description,
                'name' => Str::title(Str::limit($request->description)),

                //
                'status' => 'PENDING',

            ]);

            return $this->success('please wait, we send your request to Garry',$issue);
        });

    }

    public function create(CreateIssueRequest $request)
    {
        $filters = collect($request->filter)->sort();
        $client = $request->user();


        $client_address = UserAddress::cacheForever()->find($request->user_address_id);


        $date = $request->date;
        $dateDay = Carbon::create($date)->format('l');
        $worker = Worker::dontCache()
            ->active()
            ->where('workers.country_id', $client_address->country_id)
            ->whereJobs($request->job_id, $date)
            ->whereHas('schedules', function ($q) use ($dateDay) {
                return $q->where('day', $dateDay)->where('active', true);
            })
            // select price columns form worker_jobs->where('worker_jobs.worker_id','=','worker.id')->where('worker_jobs.job_id','=',$request->job_id)-> and name it : worker_job_price
            ->join('worker_jobs', function ($join) use ($request) {
                $join->on('workers.id', '=', 'worker_jobs.worker_id')
                    ->where('worker_jobs.job_id', '=', $request->job_id);
            })
            ->join('states', function ($join) use ($request) {
                $join->on('workers.state_id', '=', 'states.id');
            })
            ->join('cities', function ($join) use ($request) {
                $join->on('workers.city_id', '=', 'cities.id');
            })
            ->select('workers.*',


                'cities.lng as city_lng',
                'cities.lat as city_lat',

                average_worker_price_raw(),
                client_distance_raw($client_address)
            );


        // filter
        foreach ($filters as $filter => $priority) {

            // rate and price
            // Rate
            if ($filter == 'hRate') {
                $worker->where('rate', '>=', '3.5')->orderByDesc('rate');
            } elseif ($filter == 'lRate') {
                $worker->where('rate', '<', '4')->orderBy('rate');
            }

            // Price
            if ($filter == 'lPrice') {
                $worker->orderBy('average_worker_price');
            } elseif ($filter == 'hPrice') {
                $worker->orderByDesc('average_worker_price');
            }


            // place and distance
            if ($filter == 'outState') {
//                $worker->where('state_id','!=',$client->state_id);  can't be outState!
            }

            if (in_array($filter, ['inState', 'outCity', 'inCity'])) {
                $worker->where('workers.state_id', $client_address->state_id);
                if ($filter == 'outCity') {
                    $worker->where('workers.city_id', '!=', $client_address->city_id);
                } elseif ($filter == 'inCity') {
                    $worker->where('workers.city_id', $client_address->city_id);
                }
            }

            if ($filter == 'distance') {
                $worker->orderBy('city_distance');
            }
        }


        // todo: check slots


        // get the workers
        $worker = $worker
            ->whereNotIn('workers.id', json_decode($request->reject_workers) ?? [])
            ->first();


        if (!$worker) return $this->error('sorry.. cant find any worker at this moment!, You may want to try searching for workers with a different specification', 404);

        return $this->success('we did find this worker for you: ' . $worker->id, new WorkerResource($worker));
//        return $this->success('we did find this worker for you: ' .  $worker['id'], $worker);

    }
}
