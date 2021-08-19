<?php

namespace App\Http\Requests\API\Worker;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class AssignScheduleRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'days' => "required|array|max:7",
            'days.*.day' =>  ['required',"in:" . implode(',', Carbon::getDays()), ],
            'days.*.time_from'=> 'required|date_format:H:i',
            'days.*.time_to'=> 'required|date_format:H:i',
            'days.*.active'=> 'required|boolean',
        ];
    }
}
