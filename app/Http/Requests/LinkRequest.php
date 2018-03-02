<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
                    'feature_id' => ['nullable', 'numeric', 'exists:features,id'],
                    'parent_id'  => ['nullable', 'numeric'],
                    'title'      => ['required', 'min:1', 'max:190'],
                    'label'      => ['nullable', 'min:1', 'max:190'],
                    'summary'    => ['nullable', 'min:1', 'max:32000'],
                    'url'        => ['nullable', 'min:1', 'max:190'],
                    'icon'       => ['nullable', 'min:1', 'max:190'],
                    'order'      => ['nullable', 'integer', 'min:0'],
                    'image'      => ['nullable', 'max:1024', 'mimes:jpeg,jpg,png'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'feature_id' => ['nullable', 'numeric', 'exists:features,id'],
                    'parent_id'  => ['nullable', 'numeric'],
                    'title'      => ['required', 'min:1', 'max:190'],
                    'label'      => ['nullable', 'min:1', 'max:190'],
                    'summary'    => ['nullable', 'min:1', 'max:32000'],
                    'url'        => ['nullable', 'min:1', 'max:190'],
                    'icon'       => ['nullable', 'min:1', 'max:190'],
                    'order'      => ['nullable', 'integer', 'min:0'],
                    'image'      => ['nullable', 'max:1024', 'mimes:jpeg,jpg,png'],
                ];
            }
        }
    }
}
