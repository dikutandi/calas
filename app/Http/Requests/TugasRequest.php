<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
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
            'project_name' => 'required|max:155|min:10',
            'project_desc' => 'required|min:25',
            'project_ppt'  => 'required|max:10000|mimes:ppt,pptx',
        ];
    }
}
