<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePurchaseRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'Ref' => 'required|string|max:192',
            'date' => 'required|date',
            'provider_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'tax_rate' => 'nullable|numeric',
            'TaxNet' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'discount_type' => 'required|string|max:192',
            'discount_percent_total' => 'nullable|numeric',
            'shipping' => 'nullable|numeric',
            'GrandTotal' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'statut' => 'required|string|max:191',
            'payment_statut' => 'required|string|max:192',
            'notes' => 'nullable|string',
        ];
    }
}