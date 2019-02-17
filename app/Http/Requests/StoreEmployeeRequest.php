<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            //
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'email'=>'required|email',
            'phone_number'=>'required|min:7|max:9',
            'job_id'=>'required',
            'department_id'=>'required'
        ];
    }
}
