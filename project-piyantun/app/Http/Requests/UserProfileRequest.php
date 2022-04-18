<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
        // if ($this->method() == 'PUT')
        // {
        //     // $nama = 'required|unique:products, nama,'.$this->get('id');
        // } else {
        //     // $nama = 'required|unique:products, nama';
        // }
        return [
            'name' => 'required',
            'password' => 'required',
            'telepon' => 'required|numeric',
        ];
    }
}
