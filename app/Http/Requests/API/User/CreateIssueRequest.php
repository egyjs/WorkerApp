<?php

namespace App\Http\Requests\API\User;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property array $filter
 * @property array $reject_workers
 * @property int $user_address_id
 * @property mixed time_from
 * @property mixed $time_to
 * @property string $description
 * @property datetime $date
 * @property array $issue_files
 */
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
//        $max_reject_workers_rule = is_array(json_decode($this->reject_workers))?( count(json_decode($this->reject_workers)) > 3 ? 'max:3|' : '') :'';
        $post =  [
            'description' => ['required', 'string','min:50'],
            'worker_id' => 'required|integer|exists:workers,id',
            'issue_files' => 'array',
            'issue_files.*' => 'max:100000|mimes:mp4,webm,ogg,avi,png,jpg,jpeg,wav,mp3', // todo cache ext form flutter developers
        ];

        $get = [
            'job_id' => 'required|integer|exists:jobs,id',
            'user_address_id' => 'required|integer|exists:user_addresses,id,user_id,'.$this->user()->id,


            'date' => ['required', 'date'],
            'time_from' => ['required'],
            'time_to' => ['required'],


            'filter.*' => ['required',],

            'filter.lPrice' => ['required_without:filter.hPrice', 'integer', 'distinct'],
            'filter.hPrice' => ['required_without:filter.lPrice', 'integer', 'distinct'],

            'filter.lRate' => ['required_without:filter.hRate', 'integer', 'distinct'],
            'filter.hRate' => ['required_without:filter.lRate', 'integer', 'distinct'],

            'filter.outCity' => ['required_without_all:filter.inCity,filter.outState', 'integer', 'distinct'], // cant be outCity + outState !
            'filter.inCity'  => ['required_without_all:filter.outCity,filter.outState', 'integer', 'distinct'], // cant be inCity +  outState !


//            'reject_workers' => $max_reject_workers_rule.'nullable|regex:/^\[((\d{1,9})(,\d{1,9}?)*)?\]$/m'
            'reject_workers' => ['array','max:3'],


        ];
        return $this->isMethod('post')? array_merge($get, $post) : $get;
    }
}
