<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
                    'file'  => [
                        'required',
                        'max:51200',
                        'mimes:jpeg,jpg,png,gif,psd,pdf,zip,mp4,doc,docx,xls,xlsx,txt',
                    ],
                ];
            }
            // update
            case 'PATCH': {
                return [
                    'title' => ['required', 'min:3', 'max:190'],
                    'file'  => [
                        'nullable',
                        'max:51200',
                        'mimes:jpeg,jpg,png,gif,psd,pdf,zip,mp4,doc,docx,xls,xlsx,txt',
                    ],
                ];
            }
        }


    }
}
