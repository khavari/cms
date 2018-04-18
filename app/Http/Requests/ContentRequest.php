<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
                    'vocabulary_id' => ['nullable', 'numeric', 'exists:vocabularies,id'],
                    'category_id'   => ['nullable', 'numeric', 'exists:categories,id'],
                    'slug'          => ['required', 'min:3', 'max:64'],
                    'title'         => ['required', 'min:3', 'max:190'],
                    'summary'       => ['nullable', 'min:3', 'max:32000'],
                    'body'          => ['nullable', 'min:3', 'max:32000'],
                    'description'   => ['nullable', 'min:3', 'max:255'],
                    'keywords'      => ['nullable', 'min:3', 'max:255'],
                    'file'          => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'order'         => ['nullable', 'numeric'],
                    'published_at'  => ['required', 'date' ,'date_format:Y-m-d', 'after:2018-01-01', 'before:2037-01-01'],
                    'featured'      => ['nullable', 'numeric'],
                    'active'        => ['nullable', 'numeric'],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'vocabulary_id' => ['nullable', 'numeric', 'exists:vocabularies,id'],
                    'category_id'   => ['nullable', 'numeric', 'exists:categories,id'],
                    'slug'          => ['required', 'min:3', 'max:64'],
                    'title'         => ['required', 'min:3', 'max:190'],
                    'summary'       => ['nullable', 'min:3', 'max:32000'],
                    'body'          => ['nullable', 'min:3', 'max:32000'],
                    'description'   => ['nullable', 'min:3', 'max:255'],
                    'keywords'      => ['nullable', 'min:3', 'max:255'],
                    'file'          => ['nullable', 'mimes:jpeg,jpg,png', 'max:1024'],
                    'published_at'  => ['required', 'date' ,'date_format:Y-m-d', 'after:2018-01-01', 'before:2037-01-01'],
                    'order'         => ['nullable', 'numeric'],
                    'featured'      => ['nullable', 'numeric'],
                    'active'        => ['nullable', 'numeric'],
                ];
            }
        }
    }
}
