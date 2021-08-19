<?php

namespace App\Http\Controllers\API\Worker;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\Worker\{AssignJobsRequest, AssignScheduleRequest};
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\Worker\WorkerInterface;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    protected $interface;

    public function __construct(WorkerInterface $interface)
    {
        $this->interface = $interface;
    }

    public function worker(Request $request): WorkerResource
    {
        return new WorkerResource($request->user());
    }

    public function assignJobs(AssignJobsRequest $request)
    {
        return $this->interface->assignJobs($request);
    }

    public function assignSchedule(AssignScheduleRequest $request)
    {
        return $this->interface->assignSchedule($request);
    }


}
