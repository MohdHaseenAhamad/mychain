<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
              'name' => 'required|min:2|max:100',
              'mobile' => 'required|min:10|max:10',
              'email'=>'required',
              'password' => 'required|min:6',
              'confirm_password' => 'required_with:password|same:password|min:6'
          ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'mobile.required' => 'Mobile number is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
