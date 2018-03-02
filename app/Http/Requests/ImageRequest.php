<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
                    'title' => ['required', 'min:3', 'max:190'],
                    'alt' =>   ['nullable', 'min:3', 'max:190'],
                    'image'  => ['required','max:1024','mimes:jpeg,jpg,png,gif',
                    ],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'title' => ['required', 'min:3', 'max:190'],
                    'alt' =>   ['nullable', 'min:3', 'max:190'],
                    'image'  => ['nullable','max:1024','mimes:jpeg,jpg,png,gif',
                    ],
                ];
            }
        }


    }
}
