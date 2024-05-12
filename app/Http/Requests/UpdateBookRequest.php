<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $rules = [
            'co_id' => [
                'string',
                'required',
            ],
            'publisher_id' => [
                'string',
                'required',
            ],
            'bookname' => [
                'required',
                'string',
            ],
            'cover_photo' => [
                'required',
                'string'
            ],
            'price' => [
                'integer',
            ],
            'cover_photo' => [
                'required', 'image',
                'max:1048576', 'mimes:jpg,png,jpeg,gif,svg',
                function ($attribute, $value, $fail) {
                    /** @var UploadedFile $value */
                    $extension = strtolower($value->getClientOriginalExtension());
                    if ($extension === 'jfif') {
                        $fail('The uploaded image must be a valid image file (JPEG, PNG, JPG, GIF, SVG).');
                    }
                }]
        ];
        return $rules;
    }
}
