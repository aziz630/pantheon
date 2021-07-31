<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOtherFeeRequest extends FormRequest
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
            "otherFeeName" => "required",
        ];
    }

    //custom attributes or alias for field names
    public function attributes()
    {
        return [
            "otherFeeName" => "other Fee Name",
        ];
        
    }
}
