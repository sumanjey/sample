<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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

    /**Get the valodation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'department' => 'required',
            'role_id1' => 'required without:role_id2',
            'role_id2' => 'required without:role_id1',
            'password' => 'required|string|confirmed|min:8',
                  
        ];
    }
}