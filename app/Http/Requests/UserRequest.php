<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // true kore dite hobe na hole kaj korbe na
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'username' => ['required','max:20','min:6'] ,
         'email' => 'email|required|string|max:30|unique:users' // unique er khetre table name dite hobe..
        ];
    }
}
