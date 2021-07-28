<?php

namespace App\Repositories\Worker;


use App\Helpers\EgyJsTools\Facades\ArrayTool;
use App\Helpers\StorageHelper;
use App\Http\Requests\API\Worker\Auth\AssignJobsRequest;
use App\Http\Requests\API\Worker\Auth\LoginRequest;
use App\Http\Requests\API\Worker\Auth\RegisterRequest;
use App\Http\Resources\Common\JobResource;
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\Worker\WorkerInterface;

use App\Models\Common\Job;
use App\Models\Worker\Worker;
use App\Models\Worker\WorkerDevice;
use App\Models\Worker\WorkerJob;
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
}
