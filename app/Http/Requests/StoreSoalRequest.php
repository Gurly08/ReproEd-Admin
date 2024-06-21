<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSoalRequest extends FormRequest
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
            'pertanyaan' => 'required|max:255',
            'kategori' => 'required|in:kesehatan_reproduksi,kehammilan,perubahan_emosi',
            'jawaban_a' => 'required|max:255',
            'jawaban_b' => 'required|max:255',
            'kunci' => 'required|in:a,b',
        ];
    }
}
