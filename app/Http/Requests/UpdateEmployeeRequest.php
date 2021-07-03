<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            

                 "title"      => "required",
                "fullName"   => "required",
                "fName"      => "required",
        "empCurrentAddress"  => "required",
              "empContact"   => "required",
              "role_id"      => "required",
                   "file"    => "required",
                "empfile"    => "required",
                  "empDOB"   => "required",
                // "emp_email"   => "required|email|unique:employees,emp_email,".$this->eId,
      "empPermanentAddress"  => "required",
               "empMarried"  => "required",
           "empNationality"  => "required",
               "empGender"   => "required",
              "empReligion"  => "required",
            "empExperience"  => "required",
        ];
    }
}
