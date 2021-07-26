<?php


namespace App\Interfaces\Worker;




use App\Http\Requests\API\Worker\Auth\LoginRequest;
use App\Http\Requests\API\Worker\Auth\LogoutRequest;
use App\Http\Requests\API\Worker\Auth\RegisterRequest;

interface WorkerInterface
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
    public function delete(int $id);

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