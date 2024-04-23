<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
            'duration' => 'nullable|string',
            'lectures' => 'nullable|integer|min:0',
            'quizzes' => 'nullable|integer|min:0',
            'people_enrolled' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'image' => ['required', 'image'],
        ];
    }
}
