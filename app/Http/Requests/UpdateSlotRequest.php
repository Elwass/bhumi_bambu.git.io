<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date', 'after_or_equal:today'],
            'quota' => ['required', 'integer', 'min:1'],
            'booked_count' => ['sometimes', 'integer', 'min:0'],
            'is_open' => ['sometimes', 'boolean'],
        ];
    }
}
