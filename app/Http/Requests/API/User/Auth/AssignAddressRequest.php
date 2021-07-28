<?php

namespace App\Http\Requests\API\User\Auth;

use App\Constants\DB;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AssignAddressRequest extends FormRequest
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
            'name' => 'required',
            'street_name' => 'required',
            'type' => 'required|in:'.implode(',',DB::building_types),
            'building_name'=>'required',
            'floor_no'=>'required_if:type,APARTMENT,OFFICE',
            'building_no'=>'required_if:type,APARTMENT,OFFICE',
            'office_name'=>'required_if:type,OFFICE',
            'postal_code'=>'required|regex:/^\d{5}([ \-]\d{5})?$/',
//            'postal_code'=>'required',
            'phone_code'=>'required|integer',
            'phone'=>['required','regex:/^\(?([0-9]{3})\)?[.]?([0-9]{3})[.]?([0-9]{4})$/'],
            'primary'=>'required|boolean',

            'country_id'=>'required|exists:countries,id',
            'state_id'=>'required|exists:states,id',
            'city_id'=>'required|exists:cities,id',

            'lat'=>['required','regex:/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/'],
            'lng'=>['required','regex:/^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/'],

        ];
    }
}
