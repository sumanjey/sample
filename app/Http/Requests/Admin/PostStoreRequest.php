<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'heading' =>'required',
            'content' =>'required',
            'created_at' =>'nullable'             
        ];
    }
}