<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            
            //Student Validations
            'fullName'           => 'required',
            'stdGender'          => 'required',
            'stdDOB'             => 'required',
            'stdPOB'             => 'required',
            'stdImage'           => 'required',
            'stdReligion'        => 'required',
            'stdNationality'     => 'required',
            'stdCurrentAddress'  => 'required',
            'stdPermanentAddress'=> 'required',
            'stdEmergency'       => 'required',
            'stdFatherName'      => 'required',
            'stdFatherCNIC'      => 'required',
            'stdFatherOccupation'=> 'required',
            'stdMotherName'      => 'required',
            'stdMotherCNIC'      => 'required',
            'stdMotherOccupation'=> 'required',
             //Guardian validation
            "guardianName"      => "required",
            "guardianCnic"      => "required",
            "guardianMobile"    => "required",
            "guardianHomePhone" => "required",
            "guardianEmail"     => "required",
            "gurdianAddress"    => "required",
            "guardianOccupation"=> "required",
            "guardianCnicCopy"  => "required",
            //Student Enrollment Validations
            "class"              => "required",
            "section"            => "required",
            "session"            => "required",
            "stdAdmissionDate"    => "required",
        ];
    }
}










////////////////////










// return [

//     //Student Guardian Validations
//     "guardianName"      => "required",
//     "guardianCnic"      => "required",
//     "guardianMobile"    => "required",
//     "guardianHomePhone" => "required",
//     "guardianEmail"     => "required",
//     "gurdianAddress"    => "required",
//     "guardianOccupation"=> "required",
//     "guardianCnicCopy"  => "required",


//     //Student Validations
//     "fullName"           => "required",
//     "stdGender"          => "required",
//     "stdDOB"             => "required",
//     "stdPOB"             => "required",
//     "stdImage"           => "required",
//     "stdReligion"        => "required",
//     "stdNationality"     => "required",
//     "stdCurrentAddress"  => "required",
//     "stdPermanentAddress"=> "required",
//     "stdEmail"           => "required",
//     "stdEmergency"       => "required",
//     "stdAdmissionDate"   => "required",
//     "stdFatherName"      => "required",
//     "stdFatherCNIC"      => "required",
//     "stdFatherOccupation"=> "required",

//     "stdMotherName"      => "required",
//     "stdMotherCNIC"      => "required",
//     "stdMotherOccupation"=> "required",


//     //Student Enrollment Validations
//     "class"              => "required",
//     "section"            => "required",
//     "session"            => "required",
//     "enrollment_date"    => "required",
    
//     //Student Family Transaction Validations
//     // "Security" => "rquired",

    
    
//     //Student Fee Validations
//     // "structure_id" => "required",
//     // "Security" => "required",
//     // "concission" => "required",
//     // "deposit" => "required",



// ];


//custom attributes or alias for field names
    // public function attributes()
    // {
    //     return [

    //         //Student Guardian Attributes
    //         "guardianName" => "Guardian Name",
    //         "guardianCnic" => "Guardian CNIC",
    //         "guardianMobile" => "Guardian Mobile",
    //         "guardianHomePhone" => "Guardian Home Phone",
    //         "guardianEmail" => "Guardian Email",
    //         "guardianAddress" => "Guardian Address",
    //         "guardianOccupation" => "Guardian Occupation",

            
    //         //Student Attributes
    //         "fullName" => "Full Name",
    //         "stdGender" => "Student Gender",
    //         "stdDOB" => "Student Date Of Birth",
    //         "stdPOB" => "Student Place Of Birth",
    //         "stdReligion" => "Student Religion",
    //         "stdNationality" => "Student Nationality",
    //         "stdCurrentAddress" => "Student Current Address",
    //         "stdPermanentAddress" => "Student Permanent Address",
    //         "stdEmail" => "Student Email",
    //         // "stdPhone" => "Student Phone",
    //         "stdEmergency" => "Student Emergency",
    //         "stdAdmissionDate" => "Student Admission Date",
    //         "regNumber" => "Registeration Number",
    //         "stdFatherName" => "Student Father Name",
    //         "stdFatherCNIC" => "Student Father CNIC",
    //         "stdFatherOccupation" => "Student Father Occupation",
    //         "stdMotherName" => "Student Mother Name",
    //         "stdMotherCNIC" => "Student Mother CNIC",
    //         "stdMotherOccupation" => "Student Mother Occupation",


    //         //Student Enrollment Validations
    //         "class" => "Class",
    //         "section" => "Section",
    //         "session" => "Session",

            
    //         //Student Family Transaction Validations
    //         // "Security" => "Security",

            
            
    //         //Student Fee Validations
    //         // "structure_id" => "Sturcture ID",
    //         // "Security" => "Security",
    //         // "concission" => "Concission",
    //         // "deposit" => "Deposite",
    //     ];
    // }