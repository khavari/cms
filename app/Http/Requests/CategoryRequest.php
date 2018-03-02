<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'parent_id'     => ['nullable', 'numeric'],
                    'vocabulary_id' => ['nullable', 'numeric', 'exists:vocabularies,id'],
                    'slug'          => ['required', 'min:3', 'max:64'],
                    'title'         => ['required', 'min:3', 'max:190'],
                    'summary'       => ['nullable', 'min:3', 'max:32000'],
                    'body'          => ['nullable', 'min:3', 'max:32000'],
                    'description'   => ['nullable', 'min:3', 'max:190'],
                    'keywords'      => ['nullable', 'min:3', 'max:190'],
                    'file'          => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'order'         => ['nullable', 'numeric'],
                    'featured'      => ['nullable', 'numeric'],
                    'active'        => ['nullable', 'numeric'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'parent_id'     => ['nullable', 'numeric'],
                    'vocabulary_id' => ['nullable', 'numeric', 'exists:vocabularies,id'],
                    'slug'          => ['required', 'min:3', 'max:64'],
                    'title'         => ['required', 'min:3', 'max:190'],
                    'summary'       => ['nullable', 'min:3', 'max:32000'],
                    'body'          => ['nullable', 'min:3', 'max:32000'],
                    'description'   => ['nullable', 'min:3', 'max:190'],
                    'keywords'      => ['nullable', 'min:3', 'max:190'],
                    'file'          => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'order'         => ['nullable', 'numeric'],
                    'featured'      => ['nullable', 'numeric'],
                    'active'        => ['nullable', 'numeric'],
                ];
            }
        }
    }
}
