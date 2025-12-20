<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'method' => ['required', 'in:transfer,cash'],
            'amount' => ['required', 'numeric', 'min:0'],
            'proof_image' => ['nullable', 'image', 'max:4096'],
            'paid_at' => ['nullable', 'date'],
        ];
    }
}
