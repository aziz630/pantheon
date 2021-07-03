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
            
                "title"      => "required",
                "fullName"   => "required",
                "fName"      => "required",
        "empCurrentAddress"  => "required",
              "empContact"   => "required",
              "role_id"      => "required",
                   "file"    => "required",
                "empfile"    => "required",
                  "empDOB"   => "required",
                "emp_email"  => "required|email|unique:employees",
      "empPermanentAddress"  => "required",
               "empMarried"  => "required",
           "empNationality"  => "required",
               "empGender"   => "required",
              "empReligion"  => "required",
            "empExperience"  => "required",
        ];
    }

    public function attributes()
    {

        return [
          "title"       => "employee title",
          "fullName"    => "employee name",
          "fName"       => "employee father name",
   "empCurrentAddress"  => "employee address",
        "empContact"    => "employee contact",
              "file"    => "employee profile Picture",
           "empfile"    => "employee attachement file",
          "empDOB"      => "employee date of birth",
          "empEmail"    => "employee email",
"empPermanentAddress"   => "employee permanet address",
         "empMarried"   => "employee status",
      "empNationality"  => "employee nationality",
       "empGender"      => "employee gender",
         "empReligion"  => "employee relagion",

        ];
    }
}
