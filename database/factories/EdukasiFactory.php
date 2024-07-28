<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Edukasi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edukasi>
 */
class EdukasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_edukasi' => $this->faker->text(),
            'deskripsi_edukasi' => $this->faker->paragraph,
            'gambar' => $this->faker->imageUrl,
            'video_edukasi' => $this->faker->url,
        ];
    }
}
