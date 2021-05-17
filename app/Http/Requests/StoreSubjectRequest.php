<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            "subjectName" => "required",
            "subjectDescription" => "required",
        ];
    }


    //custom attributes or alias for field names
    public function attributes()
    {
        return [
            "subjectName" => "Subject Name",
            "subjectDescription" => "Subject Description",
        ];
    }
}