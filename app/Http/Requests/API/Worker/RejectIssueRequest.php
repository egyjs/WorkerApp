<?php

namespace App\Http\Requests\API\Worker;

use App\Helpers\EgyJsTools\ValidationTool\Facades\ValidationTool;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RejectIssueRequest extends FormRequest
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
        return [
            'user_issue_id' => 'required',
            'reason'=>'required|min:80' // todo: regex to prevent "............."
        ];
    }
}
