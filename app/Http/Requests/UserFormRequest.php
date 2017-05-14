<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->user['id']);
        return [
            'name' => 'required|unique:users,name,'.$this->user['id'],
            'email' => 'required|email|unique:users,email,'.$this->user['id'],
            'password' => 'required|min:6|max:8',
            'password_confirmation' => 'required|same:password',
            'id_group' => 'required|integer',
            'color' => 'required',
       ];
    }
}
