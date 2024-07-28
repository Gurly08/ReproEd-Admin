<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEdukasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul_edukasi' => 'required|max:255',
            'deskripsi_edukasi' => 'required|max:255',
            'gambar' => 'required|url|max:255',
            'video_edukasi' => 'required|url|max:255',
        ];
    }
}
