<?php

namespace App\Http\Requests\API\User;

use App\Helpers\EgyJsTools\ValidationTool\Facades\ValidationTool;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateIssueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return ValidationTool::required('date')
            ->asDate()
            ->required('name')
            ->generate(true);

    }
}
