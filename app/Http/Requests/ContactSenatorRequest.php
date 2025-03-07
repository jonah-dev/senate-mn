<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSenatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'senator_id' => 'required|string|exists:senators,senator_id',
            'sender_last_name' => 'required|string',
            'sender_email' => 'required|email',
            'message' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'senator_id.required' => 'Please select a senator.',
            'senator_id.exists' => 'The selected senator does not exist.',
            'sender_last_name.required' => 'Please enter your last name.',
            'sender_email.required' => 'Please enter your email address.',
            'sender_email.email' => 'Please enter a valid email address.',
            'message.required' => 'Please enter a message.',
        ];
    }
}
