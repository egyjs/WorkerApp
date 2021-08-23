<?php

namespace App\Repositories\User;

use App\Helpers\DBHelpers;
use App\Helpers\StorageHelper;
use App\Http\Requests\{API\User\CreateIssueRequest, API\User\StoreIssueRequest, API\Worker\RejectIssueRequest};
use App\Models\Common\RejectedIssue;
use App\Http\Resources\{User\Issue\UserIssueResource, Worker\WorkerResource};
use App\Interfaces\User\IssueInterface;
use App\Models\User\{IssueFile, UserAddress, UserIssue};
use App\Models\Worker\Worker;
use App\Traits\ResponseAPI;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IssueRepository implements IssueInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function store(StoreIssueRequest $request)
    {
        $client = $request->user();
        $worker = Worker::with(['jobs'])->find($request->worker_id);
        $job = $worker->jobs->where('id', $request->job_id)->first();

        if (!$worker->isActive() && !$job->pivot->active) return $this->error('sorry.. this worker isn\'t active yet! ');
        // todo: check slots


        // store issue in db
        return DB::transaction(function () use ($request, $client, $worker, $job) {
            $issue = UserIssue::create([
                // relations
                'worker_id' => $worker->id,
                'user_id' => $client->id,
                'user_address_id' => $request->user_address_id,
                'job_id' => $job->id,

                // data
                'date' => Carbon::parse($request->date),
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'description' => $request->description,
                //'name' => Str::title(Str::limit($request->description)),

                //
                'status' => 'PENDING',

            ]);

            $issueFilesData = [];
            foreach ($request->issue_files as $i => $file) {
                $filetype = fType($file->getClientMimeType(), ['image', 'video', 'audio']);
                if ($filetype) {
                    $issueFilesData[$i]['user_id'] = $client->id;
                    $issueFilesData[$i]['user_issue_id'] = $issue->id;
                    $issueFilesData[$i]['file'] = StorageHelper::saveAs(UserIssue::class, $file, 'issue_file');
                    $issueFilesData[$i]['type'] = $filetype;
                }
            }

            $issueFiles = IssueFile::insert($issueFilesData);


            return $this->success('please wait, we send your request to Garry', new UserIssueResource($issue));
        });

    }

    public function create(CreateIssueRequest $request)
    {
        $filters = collect($request->filter)->sort();
        $client = $request->user();
        $minimumTimeToWork = 30 * 60; // minutes to sec

        $client_address = UserAddress::cacheForever()->find($request->user_address_id);


        $date = $request->date;


        // worker_available_time_raw
        $uFrom = $request->time_from
            ? 'TIME_TO_SEC("' . $request->time_from . '")'
            : null;
        //.
        $uTo =  $request->time_to
            ? 'TIME_TO_SEC("' . $request->time_to . '")'
            : null;

        $wFrom = "TIME_TO_SEC(worker_schedules.from)";
        $wTo = "TIME_TO_SEC(worker_schedules.to)";


        $dateDay = Carbon::create($date)->format('l'); // 30-01-2002 = Wednesday

        // start query
        $worker = Worker::dontCache()
            ->active()
            ->where('workers.country_id', $client_address->country_id)
            ->whereJobs($request->job_id, $date)
//            ->
            // select price columns form worker_jobs->where('worker_jobs.worker_id','=','worker.id')->where('worker_jobs.job_id','=',$request->job_id)-> and name it : worker_job_price
            ->join('worker_jobs', function ($join) use ($request) {
                $join->on('workers.id', '=', 'worker_jobs.worker_id')
                    ->where('worker_jobs.job_id', '=', $request->job_id);
            })
            ->where('workers.state_id', $client_address->state_id)
            ->where(function ($query) use ($filters) {
                $filters = array_keys($filters->toArray());
                if (in_array('hRate', $filters)) {
                    $filter = 'hRate';
                } elseif (in_array('lRate', $filters)) {
                    $filter = 'lRate';
                }
                return $query->where(function ($q) use ($filter) {
                    if ($filter == 'hRate') {
                        $q->where('rate', '>=', '3.5')->orWhereNull('rate');
                    } elseif ($filter == 'lRate') {
                        $q->where('rate', '<=', '4')->orWhereNull('rate');
                    }
                });
            })
//            ->join('states', function ($join) use ($request) {
//                $join->on('workers.state_id', '=', 'states.id');
//            })
            ->join('worker_schedules', function ($join) use ($dateDay) {
                $join->on('workers.id', '=', 'worker_schedules.worker_id')
                    ->where('worker_schedules.day', $dateDay)->where('worker_schedules.active', true);
            })
            ->join('cities', function ($join) use ($request) {
                $join->on('workers.city_id', '=', 'cities.id');
            })
            ->select('workers.*',


                'cities.lng as city_lng',
                'cities.lat as city_lat',


                DBHelpers::average_worker_price_raw(),
                DBHelpers::worker_available_time_raw($uFrom,$uTo,$wFrom,$wTo),
                DBHelpers::client_distance_raw($client_address)
            );







        // filter
        foreach ($filters as $filter => $priority) {

            // rate and price
            // Rate
            if ($filter == 'hRate') {
                $worker->orderByDesc('rate');
            } elseif ($filter == 'lRate') {
                $worker->orderBy('rate');
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
            ->having('worker_available_time','>=',$minimumTimeToWork)
            ->whereNotIn('workers.id', json_decode($request->reject_workers) ?? [])
            ->first();


        if (!$worker) return $this->error('sorry.. cant find any worker at this moment!, You may want to try searching for workers with a different specification', 404);

        return $this->success('we did find this worker for you: ' . $worker->id, new WorkerResource($worker));

    }

    public function reject(RejectIssueRequest $request)
    {
        $worker = $request->user();
//        dd($worker);
        $issue = UserIssue::where('id',$request->user_issue_id)->where('worker_id',$worker->id)->firstOrFail();

        $data = $request->validated();
        $data['worker_id'] = $worker->id;
        $data['user_id']   = $issue->user_id;

        $rejectedIssue = RejectedIssue::create($data);

        return $this->success('issue rejected successfully', $rejectedIssue);
    }
}
