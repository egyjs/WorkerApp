<?php

namespace App\Http\Requests\API\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:55',
            'lastname' => 'required|max:55',
            'email' => 'email|unique:users',
            'phone' => 'required|integer|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

            // USER_DEVICE
            'unique_id'=> 'required|unique:user_devices',
            'platform' => 'required',
            'app_version' => 'required|in:'.config('app.version'),


        ];
    }
}
