<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'equipment_name' => ['required','string','max:255'],
            'category' => ['required','in:paddles,balls,nets,accessories'],
            'unit_price' => ['required','numeric','min:0'],
            'description' => ['nullable','string'],
            'availability_status' => ['required','in:available,unavailable'],
        ];
    }
}
