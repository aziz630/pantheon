<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
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
            "emp_title"  => "required",
            "emp_name"   => "required",
            "emp_fname"  => "required",
          "emp_address"  => "required",
          "emp_contact"  => "required",
          "emp_dob"      => "required",
            "emp_email"  => "required",
"emp_permanent_address"  => "required",
           "emp_status"  => "required",
      "emp_nationality"  => "required",
       "emp_gender"      => "required",
         "emp_religion"  => "required",
     "matric_pass_year"  => "required",
          "matric_subj"  => "required",
          "matric_schl"  => "required",
           "matric_per"  => "required",
  "secondary_pass_year"  => "required",
       "secondary_subj"  => "required",
       "secondary_schl"  => "required",
        "secondary_per"  => "required",
        ];
    }
}
