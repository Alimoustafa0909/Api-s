<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required', 'unique:admins,phone,' . $this->admin->id],
            'email' => ['required', 'unique:admins,email,' . $this->admin->id, 'email'],
        ];
    }
}
