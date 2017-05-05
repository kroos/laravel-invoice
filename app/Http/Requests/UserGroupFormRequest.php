<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGroupFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // remember : turn this true
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->user_groups['id']);
        return [
            //
            'group' => 'required|unique:user_groups,group,'.$this->user_groups['id'].'|alpha',
        ];
    }
}
