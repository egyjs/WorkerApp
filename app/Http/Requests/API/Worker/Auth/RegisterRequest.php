<?php

namespace App\Http\Requests\API\Worker\Auth;

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
            'email' => 'email|unique:workers',
            'phone' => 'required|integer|unique:workers',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

            //id
            'photo' => 'image|required|max:6250',
            'driver_license'=>'required|min:5|max:20',
            'driver_license_photo'=>'image|required|max:6250',


            // USER_DEVICE
            'unique_id'=> 'required|unique:worker_devices',
            'platform' => 'required',
            'app_version' => 'required|in:'.config('app.version'),
        ];
    }
}
