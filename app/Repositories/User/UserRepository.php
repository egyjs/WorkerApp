<?php

namespace App\Repositories\User;

use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Requests\API\User\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Interfaces\User\UserInterface;
use App\Models\User\User;
use App\Models\User\UserDevice;
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAll(): JsonResponse
    {
        try {
            $users = User::all();
            return $this->success("All Users", $users);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getById(int $id): JsonResponse
    {
        try {
            $user = User::find($id);

            // Check the user
            if (!$user) return $this->error("No user with ID $id", 404);

            return $this->success("User Detail", $user);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            if (Auth::guard('web')->attempt(['phone' => request('phone'), 'password' => request('password')])) {

                $user = Auth::guard('web')->user();
                $accessToken = $user->createToken('AuthToken', ['users'])->accessToken;
                $data = ['user' => new UserResource($user), 'access_token' => $accessToken];


                $user_device_data = [
                    'unique_id'=>$request->unique_id,
                    'user_id'=>$user->id,
                    'platform'=>$request->platform,
                    'app_version'=>$request->app_version,
                    'ip'=>$request->ip(),
                    'loggedin_at' => Carbon::now(),
                    'loggedout_at' => null,
                ];

                $user_device = UserDevice::updateOrCreate([
                    'user_id'=>$user->id,
                    'unique_id'=>$request->unique_id,
                    'platform'=>$request->platform,
                ],$user_device_data);


                return $this->success("User Detail", $data);
            } else {

                return $this->error('Unauthorised', 401);
            }

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
                'user_id'=>$user->id,
                'platform'=>$request->platform,
                'app_version'=>$request->app_version,
                'ip'=>$request->ip(),
                'loggedin_at' => null,
                'loggedout_at' => Carbon::now(),
            ];

            UserDevice::updateOrCreate([
                'user_id'=>$user->id,
                'unique_id'=>$request->unique_id,
                'platform'=>$request->platform,
            ],$user_device_data);

            $user->token()->revoke();
            return $this->success("User loggedout successfully", $data);
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

            // Save the user
            $user = User::create($validatedData);
            $accessToken = $user->createToken('AuthToken', ['users'])->accessToken;


            $user_device = UserDevice::create([
                'unique_id'=>$request->unique_id,
                'user_id'=>$user->id,
                'platform'=>$request->platform,
                'app_version'=>$request->app_version,
                'ip'=>$request->ip(),
                'loggedin_at' => Carbon::now(),
                'loggedout_at' => null,
            ]);


            $data = ['user' => new UserResource($user), 'access_token' => $accessToken];

            return $this->success("User created", $data, 201);
        });
    }

    public function deleteUser(int $id): JsonResponse
    {
        DB::transaction(function () use ($id) {
            $user = User::find($id);

            // Check the user
            if (!$user) return $this->error("No user with ID $id", 404);

            // Delete the user
            $user->delete();

            return $this->success("User deleted", $user);
        });
    }
}
