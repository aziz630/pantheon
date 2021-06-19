<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomEmployRequest extends FormRequest
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
            "dom_emp_title"  => "required",
            "dom_emp_name"   => "required",
            "dom_emp_fname"  => "required",
          "dom_emp_address"  => "required",
          "dom_emp_contact"  => "required",
          "dom_emp_dob"      => "required",
            "dom_emp_email"  => "required",
"dom_emp_permanent_address"  => "required",
           "dom_emp_status"  => "required",
      "dom_emp_nationality"  => "required",
       "dom_emp_gender"      => "required",
         "dom_emp_religion"  => "required",
        ];
    }
}
