<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
        $user = $this->user;
        if(Auth::user()->role->name == "Admin"){
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($user->id),],
            'department' => 'required',
            'role_id1' => 'required without:role_id2',
            'role_id2' => 'required without:role_id1',
            'password' => 'nullable|string|confirmed|min:8',
        ];
    }
    else{
        return[
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'nullable|string|confirmed|min:8',
        ];
    }
    }
}