<?php

namespace App\Http\Requests;

use App\Rules\UserHasTime;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'estimated_minutes' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
            'assigned_to' => ['nullable', 'exists:users,id', new UserHasTime],
        ];
    }
}
