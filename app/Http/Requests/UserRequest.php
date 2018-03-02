<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'name'        => ['required', 'min:3', 'max:190'],
                    'role_id'     => ['required', 'numeric', 'exists:roles,id'],
                    'username'    => ['required', 'min:6', 'max:190', 'unique:users'],
                    'email'       => ['required', 'min:6', 'max:190', 'unique:users'],
                    'password'    => ['required', 'min:6', 'max:190', 'confirmed'],
                    'phone'       => ['nullable', 'min:3', 'max:190'],
                    'mobile'      => ['nullable', 'min:3', 'max:190'],
                    'chat_id'     => ['nullable', 'min:3', 'max:190'],
                    'postal'      => ['nullable', 'min:3', 'max:190'],
                    'national_id' => ['nullable', 'min:3', 'max:190'],
                    'address'     => ['nullable', 'min:3', 'max:190'],
                    'bio'         => ['nullable', 'min:3', 'max:32000'],
                    'site'        => ['nullable', 'string', 'min:3', 'max:190'],
                    'amount'      => ['nullable', 'numeric', 'min:0', 'max:10000000000000'],
                    'gender'      => ['required'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'name'        => ['required', 'min:3', 'max:190'],
                    'role_id'     => ['nullable', 'numeric', 'exists:roles,id'],
                    'username'    => ['nullable', 'min:6', 'max:190'],
                    'email'       => ['nullable', 'min:6', 'max:190'],
                    'password'    => ['nullable', 'min:6', 'max:190', 'confirmed'],
                    'phone'       => ['nullable', 'min:3', 'max:190'],
                    'mobile'      => ['nullable', 'min:3', 'max:190'],
                    'chat_id'     => ['nullable', 'min:3', 'max:190'],
                    'postal'      => ['nullable', 'min:3', 'max:190'],
                    'national_id' => ['nullable', 'min:3', 'max:190'],
                    'address'     => ['nullable', 'min:3', 'max:190'],
                    'bio'         => ['nullable', 'min:3', 'max:32000'],
                    'site'        => ['nullable', 'string', 'min:3', 'max:190'],
                    'amount'      => ['nullable', 'numeric', 'min:0', 'max:10000000000000'],
                    'gender'      => ['nullable'],
                ];
            }
        }
    }
}
