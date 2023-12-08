<?php

namespace App\Http\Requests\Admin\RoomCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomCategoryRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'price' => ['required','numeric'],
            'size' => ['required','string','max:255'],
            'capacity' => ['required','string','max:255']
        ];
    }
}
