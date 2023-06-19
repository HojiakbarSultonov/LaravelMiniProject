<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function attributes()
    {
       return [
            'title'=>"Sarlavha",
            'short_content'=>"Qisqacha",
            'content'=>'Maqola'
           ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'title'=> 'required|max:255',
            'short_content'=> 'required',
            'content'=> 'required',
            'photo'=>'nullable|image|max:2048',
        ];
    }
}
