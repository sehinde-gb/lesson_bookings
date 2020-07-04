<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonsRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'lecturer' => 'required',
            'objectives' => 'required',
            'prerequisites' => 'required',
            'evaluation' => 'required',
            'resources' => 'required',
            'activity' => 'required',
            'students' => 'exists:students,id'
        ];
    }
}
