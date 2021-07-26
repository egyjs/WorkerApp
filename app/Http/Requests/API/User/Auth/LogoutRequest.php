<?php

namespace App\Http\Requests\API\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LogoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // USER_DEVICE
            'unique_id'=> 'required',
            'platform' => 'required',
            'app_version' => 'required|in:'.config('app.version'),

        ];
    }
}
