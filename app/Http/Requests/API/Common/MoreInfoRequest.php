<?php

namespace App\Http\Requests\API\Common;

use App\Models\User\User;
use App\Models\Worker\Worker;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $user_issue_id
 * @property string $question
 * @property string $answer
 * @property User|Worker $user
 */
class MoreInfoRequest extends FormRequest
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
        $data = [];
        if(class_basename($this->user()) == 'Worker'){
            $data = [
                'question' => 'required|min:80',
            ];
        }else if(class_basename($this->user()) == 'User'){
            $data = [
                'answer' => 'required|min:120',
            ];
        }


        return [
                'user_issue_id' => 'required|exists:user_issues,id'
            ] + $data;
    }
}
