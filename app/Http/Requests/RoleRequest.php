<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                    'name'        => ['required', 'string', 'min:3', 'max:190', 'unique:roles'],
                    'slug'        => ['required', 'string', 'min:3', 'max:64', 'unique:roles'],
                    'description' => ['nullable', 'string', 'min:0', 'max:32000'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'name'        => ['required', 'string', 'min:3', 'max:190'],
                    'slug'        => ['required', 'string', 'min:3', 'max:64'],
                    'description' => ['nullable', 'string', 'min:0', 'max:32000'],
                ];
            }
        }
    }
}
