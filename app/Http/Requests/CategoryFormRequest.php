<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Categories;

class CategoryFormRequest extends FormRequest
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
        return [
            'category' => 'required|unique:categories,category,'.$this->categories['id'].'|alpha',  // '.$this->categories['id']' to ignore for the update process
            'active' => 'integer',
        ];
    }
}
