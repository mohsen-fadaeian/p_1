<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
            'home_tell_number'=>'required',
            'emergency_tell_number'=>'required',
            'mobile_number'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'school_level'=>'required',
            'sex'=>'required',
            'dad_name'=>'required',
            'birth_date'=>'required',
            'password'=>'required',
        ];
    }
}
