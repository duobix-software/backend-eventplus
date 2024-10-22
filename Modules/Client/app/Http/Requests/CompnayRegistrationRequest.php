<?php

namespace Duobix\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompnayRegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:64'],
            'email' => ['required', 'email:rfc,dns', 'max:128'],
            'phone' => ['required', 'phone'],

            'organisation_logo' => ['nullable', 'image'],
            'organisation_name' => ['required', 'string', 'max:128'],
            'organisation_description' => ['required', 'min_words:10', 'max_words:100'],
            'organisation_website' => ['nullable', 'url'],

            'organisation_country' => ['required', 'string'],
            'organisation_state' => ['required', 'string'],
            'organisation_postcode' => ['required', 'string'],
            'organisation_city' => ['required', 'string'],
            'organisation_address' => ['required', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
