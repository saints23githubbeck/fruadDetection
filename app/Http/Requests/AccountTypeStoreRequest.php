<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountTypeStoreRequest extends FormRequest
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
            'name'  => 'required|unique:account_types,name',
            'description' => 'nullable|min:3|max:50',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Account Type Name Required'
        ];
    }
}
