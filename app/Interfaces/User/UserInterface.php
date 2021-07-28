<?php


namespace App\Interfaces\User;


use App\Http\Requests\API\User\Auth\AssignAddressRequest;
use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Requests\API\User\Auth\LogoutRequest;
use App\Http\Requests\API\User\Auth\RegisterRequest;

interface UserInterface
{
    /**
     * Create user
     *
     * @param RegisterRequest $request
     *
     * @access  public
     */
    public function register(RegisterRequest $request);


    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request);

    /**
     * @param LogoutRequest $request
     * @return mixed
     */
    public function logout(LogoutRequest $request);

    public function assignAddress(AssignAddressRequest $request);
}
