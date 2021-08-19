<?php

namespace App\Http\Requests\API\Worker;

use App\Models\Common\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

class AssignJobsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->jobs->count() == 0;
//        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $jobsIDs= collect($this->jobs)->pluck('id');
        $jobs = Job::whereIn('id',$jobsIDs)->get();
        $rules =[];
        foreach ($jobs as $i=>$job){
            $rules["jobs.$i.price_range_from"] = "required|integer|lt:jobs.$i.price_range_to";


            if ($job['required_cert']){
                $rules["jobs.$i.certificate"] = 'required|file';
            }else{
//                $rules["jobs.$i.certificate"] = 'in:!!';
                $rules["jobs.$i.certificate"] = 'in:'.rand(1,99999);
            }
            if ($job['type'] > 1 && ($job['parent_job'] != null || $job['parent_job'] != 0) ){
                $rules["jobs.".($i-1).".id"] = 'required|in:'.$job['parent_job'];
            }
        }

        return array_merge([
            "jobs"    => "required|array|max:2",
            'jobs.*.id'=>'required|exists:jobs,id',
//            'jobs.*.time_in_minutes'=>'required|integer',
            'jobs.*.price_range_from'=>'required|integer',
            'jobs.*.price_range_to'=>'required|integer',
            'jobs.*.certificate'=>'file',
        ],$rules);
    }
}
