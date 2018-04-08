<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                    'slug'          => ['required', 'min:3', 'max:64'],
                    'title'         => ['required', 'min:3', 'max:190'],
                    'summary'       => ['nullable', 'min:3', 'max:32000'],
                    'body'          => ['nullable', 'min:3', 'max:32000'],
                    'description'   => ['nullable', 'min:3', 'max:190'],
                    'keywords'      => ['nullable', 'min:3', 'max:190'],
                    'file'          => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'order'         => ['nullable', 'numeric', 'min:0'],
                    'featured'      => ['nullable', 'boolean'],
                    'active'        => ['nullable', 'boolean'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'parent_id'         => ['nullable', 'numeric'],
                    'slug'              => ['required', 'min:3', 'max:64'],
                    'title'             => ['required', 'min:3', 'max:190'],
                    'summary'           => ['nullable', 'min:3', 'max:32000'],
                    'body'              => ['nullable', 'min:3', 'max:32000'],
                    'description'       => ['nullable', 'min:3', 'max:190'],
                    'keywords'          => ['nullable', 'min:3', 'max:190'],
                    'file'              => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'order'             => ['nullable', 'numeric', 'min:0'],
                    'featured'          => ['nullable', 'boolean'],
                    'active'            => ['nullable', 'boolean'],
                    'options.dimension' => ['nullable', 'min:3', 'max:190'],
                ];
            }
        }
    }
}
