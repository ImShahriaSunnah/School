<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultCreatePost extends FormRequest
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
            'Attendance.*' => 'nullable|numeric|max:300',
            'Assignment.*' => 'nullable|numeric|max:300',
            'class_test.*' => 'nullable|numeric|max:300',
            'presentation.*' => 'nullable|numeric|max:300',
            'quiz.*' => 'nullable|numeric|max:300',
            'Practical.*' => 'nullable|numeric|max:300',
            'MCQ.*' => 'nullable|numeric|max:300',
            'Written.*' => 'nullable|numeric|max:300',
            'Others.*' => 'nullable|numeric|max:300',
        ];
    }
}
