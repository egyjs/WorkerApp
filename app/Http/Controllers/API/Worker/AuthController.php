<?php

namespace App\Http\Controllers\API\Worker;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\Worker\Auth\AssignJobsRequest;
use App\Http\Requests\API\Worker\Auth\LoginRequest;
use App\Http\Requests\API\Worker\Auth\LogoutRequest;
use App\Http\Requests\API\Worker\Auth\RegisterRequest;
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\Worker\WorkerInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $interface;

    public function __construct(WorkerInterface $interface)
    {
        $this->interface = $interface;
    }

    /**
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        return $this->interface->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->interface->login($request);
    }

    public function logout(LogoutRequest $request)
    {
        return $this->interface->logout($request);
    }

    public function worker(Request $request): WorkerResource
    {
        return new WorkerResource($request->user());
    }

    public function assignJobs(AssignJobsRequest $request)
    {
        return $this->interface->assignJobs($request);
    }
}
