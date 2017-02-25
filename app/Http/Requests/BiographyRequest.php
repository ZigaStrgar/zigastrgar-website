<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiographyRequest extends FormRequest
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
        return [
            'title'           => 'required',
            'date'            => 'required',
            'content'         => 'required',
            'type'            => 'in:work,accomplishments,education',
            'attachment'      => 'file|mimes:pdf,docx,doc',
            'attachment_name' => 'required_if:attachment,string'
        ];
    }
}
