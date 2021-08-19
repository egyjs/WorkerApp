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
        $max_reject_workers_rule = is_array(json_decode($this->reject_workers))?( count(json_decode($this->reject_workers)) > 3 ? 'max:3|' : '') :'';
        return [
            'date' => ['required', 'date'],
            'job_id' => 'required|integer|exists:jobs,id',
            'user_address_id' => 'required|integer|exists:user_addresses,id,user_id,'.$this->user()->id,
            'filter.*' => ['required',],

            'filter.lPrice' => ['required_without:filter.hPrice', 'integer', 'distinct'],
            'filter.hPrice' => ['required_without:filter.lPrice', 'integer', 'distinct'],

            'filter.lRate' => ['required_without:filter.hRate', 'integer', 'distinct'],
            'filter.hRate' => ['required_without:filter.lRate', 'integer', 'distinct'],

            'filter.outCity' => ['required_without_all:filter.inCity,filter.outState', 'integer', 'distinct'], // cant be outCity + outState !
            'filter.inCity'  => ['required_without_all:filter.outCity,filter.outState', 'integer', 'distinct'], // cant be inCity +  outState !


            'reject_workers' => $max_reject_workers_rule.'nullable|regex:/^\[((\d{1,9})(,\d{1,9}?)*)?\]$/m'

//            'filter.outState' => ['required_without_all:filter.inState,filter.inCity', 'integer', 'distinct'], // cant be inCity +  outState !
//            'filter.inState'  => ['required_without:filter.outState', 'integer', 'distinct'], // can be inState +  outCity  :)
        ];
    }
}
