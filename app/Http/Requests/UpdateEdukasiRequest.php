<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEdukasiRequest extends FormRequest
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
            'judul_edukasi' => 'required|string|max:255',
            'deskripsi_edukasi' => 'required|string|max:255',
            'gambar' => 'nullable|url',
            'video_edukasi' => 'nullable|url',
        ];
    }
}
