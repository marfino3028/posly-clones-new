<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $ruleData = 'nullable|numeric';
        return [
            'username' => 'required',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            'postal_code' => $ruleData,
            'phone' => $ruleData,
            'email' => 'email|required',
        ];
    }
}
