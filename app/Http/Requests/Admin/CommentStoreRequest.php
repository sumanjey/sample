<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'ID' => 'required|integer',
            'Title' => 'required|string',
            'user_id' => 'required|integer|unique:users',
            'created_by' => 'required|string|max:255|unique:users',
                 
        ];
    }
}