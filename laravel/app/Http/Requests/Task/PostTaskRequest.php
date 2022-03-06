<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class PostTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
        ];
    }
}
