<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
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
            'font' => 'required|file|max:2048|mimes:ttf,eot,fon,fot,otf,tte,ttc',
            'name' =>  'required', 
        ];
    }
   
}
