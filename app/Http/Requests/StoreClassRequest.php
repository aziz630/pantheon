<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "className" => "required",
            "classLimit" => "required",
        ];
    }

    //custom attributes or alias for field names
    public function attributes()
    {
        return [
            "className" => "Class Name",
            "classLimit" => "Class Limit",
        ];
    }
}