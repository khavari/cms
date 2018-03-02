<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        switch ($this->method()) {
            // create
            case 'POST': {
                return [
                    'name'    => ['required', 'min:3', 'max:190'],
                    'email'   => ['required', 'min:6', 'max:190'],
                    'subject' => ['nullable', 'min:3', 'max:190'],
                    'company' => ['nullable', 'min:3', 'max:190'],
                    'country' => ['nullable', 'min:3', 'max:190'],
                    'phone'   => ['nullable', 'min:3', 'max:190'],
                    'mobile'  => ['nullable', 'min:3', 'max:190'],
                    'subject' => ['nullable', 'min:3', 'max:190'],
                    'message' => ['nullable', 'min:3', 'max:32000'],
                ];
            }
            // update
            case 'PATCH': {
                return [

                ];
            }
        }
    }
}
