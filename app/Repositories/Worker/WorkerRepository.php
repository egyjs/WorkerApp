<?php

namespace App\Repositories\Worker;


use App\Helpers\AuthWorkerHelper;
use App\Helpers\DBHelpers;
use App\Helpers\EgyJsTools\Facades\ArrayTool;
use App\Helpers\StorageHelper;
use App\Http\Requests\API\User\CreateIssueRequest;
use App\Models\User\UserAddress;
use App\Http\Requests\API\Worker\{AssignJobsRequest, AssignScheduleRequest, Auth\LoginRequest, Auth\RegisterRequest};
use App\Http\Resources\Common\JobResource;
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\Worker\WorkerInterface;

use App\Models\Common\Job;
use Illuminate\Support\Facades\Cache;
use App\Models\Worker\{Worker, WorkerDevice, WorkerJob, WorkerSchedule};
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class WorkerRepository implements WorkerInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll(): JsonResponse
    {
        try {
            $users = Worker::all();
            return $this->success("All Workers", $users);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function find($id): JsonResponse
    {
        try {
            if (is_array($id)){
                $user = Worker::where($id)->first();
            }elseif(is_int($id)){
                $user = Worker::find($id);
            }
                // Check the user
            if (!$user) return $this->error("No worker with ID $id", 404);

            return $this->success("Worker Detail", $user);


        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $user = Worker::where('phone', request('phone'))->first();
            if ($user) {
                if(\Hash::check(request('password'), $user->password)){

                $accessToken = $user->createToken('AuthToken', ['workers'])->accessToken;
                $data = ['user' => new WorkerResource($user), 'access_token' => $accessToken];


                $user_device_data = [
                    'unique_id'=>$request->unique_id,
                    'worker_id'=>$user->id,
                    'platform'=>$request->platform,
                    'app_version'=>$request->app_version,
                    'ip'=>$request->ip(),
                    'loggedin_at' => Carbon::now(),
                    'loggedout_at' => null,
                ];

                $user_device = WorkerDevice::updateOrCreate([
                    'worker_id'=>$user->id,
                    'unique_id'=>$request->unique_id,
                    'platform'=>$request->platform,
                ],$user_device_data);


                return $this->success("Worker Detail", $data);
                }
            }
            return $this->error('Unauthorised', 401);

        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function logout($request): JsonResponse
    {
        try {
            $user = $request->user();
            $data = ['user' => null];

            $user_device_data = [
                'unique_id'=>$request->unique_id,
                'worker_id'=>$user->id,
                'platform'=>$request->platform,
                'app_version'=>$request->app_version,
                'ip'=>$request->ip(),
                'loggedin_at' => null,
                'loggedout_at' => Carbon::now(),
            ];

            WorkerDevice::updateOrCreate([
                'worker_id'=>$user->id,
                'unique_id'=>$request->unique_id,
                'platform'=>$request->platform,
            ],$user_device_data);

            $user->token()->revoke();
            return $this->success("Worker loggedout successfully", $data);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function register(RegisterRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $validatedData = $request->all();

            // Remove a whitespace and make to lowercase
            if (!$request->email) $request->email = $request->phone . '@garry.com';
            $validatedData['email'] = preg_replace('/\s+/', '', strtolower($request->email));
            $validatedData['password'] = bcrypt($request->password);

            $validatedData['last_ip'] = $request->ip();

            $validatedData['photo'] = StorageHelper::saveAs(Worker::class,$request->file('photo'),'photo');

            $validatedData['driver_license_photo'] = StorageHelper::saveAs(Worker::class,$request->file('driver_license_photo'),'driver_license_photo');

            // Save the user
            $user = Worker::create($validatedData);
            $accessToken = $user->createToken('AuthToken', ['workers'])->accessToken;


            $user_device = WorkerDevice::create([
                'unique_id'=>$request->unique_id,
                'worker_id'=>$user->id,
                'platform'=>$request->platform,
                'app_version'=>$request->app_version,
                'ip'=>$request->ip(),
                'loggedin_at' => Carbon::now(),
                'loggedout_at' => null,
            ]);

            $jobs = Job::all();

            $data = ['user' => new WorkerResource($user),'available_jobs'=>new JobResource($jobs) , 'access_token' => $accessToken];

            return $this->success("Worker created", $data, 201);
        });
    }

    public function delete(int $id): JsonResponse
    {
        return DB::transaction(function () use ($id) {
            $user = Worker::find($id); // todo: or bring the log in user

            // Check the user
            if (!$user) return $this->error("No user with ID $id", 404);

            // Delete the user
            $user->delete();

            return $this->success("Worker deleted", $user);
        });
    }


    /**
     * @throws Throwable
     */
    public function assignJobs(AssignJobsRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();


            $worker_jobs = ArrayTool::start();

            foreach ($request->jobs as $i=>$job){
                $worker_jobs->setKey($i)->setArray([
                    'worker_id'=>$user->id,
                    'job_id'=>$job['id'],
                    'price_range_from'=>$job['price_range_from'],
                    'price_range_to'=>$job['price_range_to'],
                    'certificate' => isset($job['certificate'])? StorageHelper::saveAs(WorkerJob::class,$job['certificate'],'certificate',$user->id.'-'.$job['id']):null,
                    'created_at' => Carbon::now(),
                ]);
            }

            WorkerJob::insert($worker_jobs->generate());

            $result = $worker_jobs->generate(true)->map(function ($item){
                if ($item->certificate)$item->certificate = asset('storage/' . $item->certificate);
                return $item;
            });


            // todo: notify admins to review the new worker
            return $this->success("jobs assigned, waiting for review", $result);
        });
    }

    public function assignSchedule(AssignScheduleRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $validatedData = $request->validated();
            $data = ArrayTool::start();


            foreach ($request->days as $i=>$day){
                $data->setKey($i)
                    ->setArray([
                        'worker_id' =>$request->user()->id,
                        'day' =>$day['day'],
                        'from'=>$day['time_from'],
                        'to'=>$day['time_to'],
                        'active'=>$day['active']
                    ]);
            }

            $data = $data->generate();



            WorkerSchedule::upsert($data,['worker_id','day']);
            Cache::flush();
            $worker_schedules = $request->user()->schedules()->select('from','to','day','active')->get();

            return $this->success('Schedules assigned successfully',[
                'schedules'=>$worker_schedules,
                'available_schedules_day'=>AuthWorkerHelper::AvailableSchedulesDay($worker_schedules)
            ]);
        });
    }

    /**
     * @inheritDoc
     */
    public function findWorkerToCreateIssue(CreateIssueRequest $request)
    {

        $minimumTimeToWork = 30 * 60; // minutes to sec
        $filters = collect($request->filter)->sort();
        $date = $request->date;


        $client_address = UserAddress::cacheForever()->find($request->user_address_id);



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


        $dateDay = \Illuminate\Support\Carbon::create($date)->format('l'); // 30-01-2002 = Wednesday


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
        return $worker
            ->having('worker_available_time','>=',$minimumTimeToWork)
            ->whereNotIn('workers.id', json_decode($request->reject_workers) ?? [])
            ->first();
    }
}
