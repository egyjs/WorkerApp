<?php

namespace App\Http\Requests\API\Worker;

use App\Helpers\EgyJsTools\ValidationTool\Facades\ValidationTool;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $user_issue_id
 */
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
            'user_issue_id' => ['required','exists:user_issues,id'],
            'reason' => 'in:MEDICAL,DISTANCE,OTHER', // todo: option points
            // medical
            // distance
            // other
        ];
    }
}
