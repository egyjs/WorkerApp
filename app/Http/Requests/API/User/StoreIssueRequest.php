<?php

namespace App\Http\Requests\API\User;

use App\Helpers\EgyJsTools\ValidationTool\Facades\ValidationTool;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreIssueRequest extends FormRequest
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
        $max_reject_workers_rule = is_array(json_decode($this->reject_workers))?( count(json_decode($this->reject_workers)) > 3 ? 'max:3|' : '') :'';
        return [
            'description' => ['required', 'string','min:50'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'job_id' => 'required|integer|exists:jobs,id',
            'worker_id' => 'required|integer|exists:workers,id',
            'user_address_id' => 'required|integer|exists:user_addresses,id,user_id,'.$this->user()->id,

            'reject_workers' => $max_reject_workers_rule.'nullable|regex:/^\[((\d{1,9})(,\d{1,9}?)*)?\]$/m'

//
      ];
    }
}
