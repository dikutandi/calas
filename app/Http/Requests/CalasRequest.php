<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalasRequest extends FormRequest
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
            'npm'       => 'required|max:25|unique:users_calas',
            'kelas'     => 'required|max:5',
            //'lab_minat' => 'required',
            'alamat'    => 'required',
            'contact'   => 'required|numeric',
            'ipk_utama' => 'required|numeric|between:0,4.00',
            'ipk_lokal' => 'required|numeric|between:0,4.00',
            'cv'        => 'required|max:10000|mimes:pdf',
        ];
    }
}
