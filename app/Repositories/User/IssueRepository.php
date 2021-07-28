<?php

namespace App\Repositories\User;

use App\Http\Requests\API\User\Auth\AssignAddressRequest;
use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Requests\API\User\Auth\LogoutRequest;
use App\Http\Requests\API\User\Auth\RegisterRequest;
use App\Http\Requests\API\User\CreateIssueRequest;
use App\Http\Resources\User\UserAddressResource;
use App\Http\Resources\User\UserResource;
use App\Interfaces\User\IssueInterface;
use App\Interfaces\User\UserInterface;
use App\Models\User\User;
use App\Models\User\UserAddress;
use App\Models\User\UserDevice;
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class IssueRepository implements IssueInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function create(CreateIssueRequest $request)
    {
        dd('t');
    }
}
