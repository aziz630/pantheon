<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreeAmountRequest extends FormRequest
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
            'fee_category.*' => 'required',
            'class_id.*' => 'required|string|distinct|min:3',
            'amount.*' => 'required|string|distinct|min:3',
        ];
    }

    //custom attributes or alias for field names
    public function attributes()
    {
        return [
            "fee_category.*" => "Free Category",
            "class_id[].*" => "Class Name",
            "amount[].*" => "Class Limit",
        ];
    }
}
