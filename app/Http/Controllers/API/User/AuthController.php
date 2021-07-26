<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Requests\API\User\Auth\LogoutRequest;
use App\Http\Requests\API\User\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Interfaces\User\UserInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $interface;

    public function __construct(UserInterface $interface)
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

    public function user(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
