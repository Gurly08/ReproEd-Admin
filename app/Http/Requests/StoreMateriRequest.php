<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMateriRequest extends FormRequest
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
            'kategori' => 'required|in:reproduksi,pubertas',
            'judul' => 'required|max:255',
            'deskripsi_materi' => 'required|max:255',
            'gambar' => 'required|url|max:255',
            'video_materi' => 'required|url|max:255',
        ];
    }
}
