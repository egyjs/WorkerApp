<?php


namespace App\Interfaces\User;


use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Requests\API\User\Auth\LogoutRequest;
use App\Http\Requests\API\User\Auth\RegisterRequest;

interface UserInterface
{
    /**
     * Get all users
     *
     * @method  /GET api/users
     * @access  public
     */
    public function getAll();

    /**
     * Get User By ID
     *
     * @param integer $id
     *
     * @method  /GET api/users/{id}
     * @access  public
     */
    public function getById(int $id);


    /**
     * Create user
     *
     * @param RegisterRequest $request
     *
     * @access  public
     */
    public function register(RegisterRequest $request);

    /**
     * Delete user
     *
     * @param integer $id
     *
     * @method  /DELETE  api/users/{id}
     * @access  public
     */
    public function deleteUser(int $id);

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
}
