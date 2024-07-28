<?php

namespace Database\Factories;

use App\Models\Materi;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'kategori' => $this->faker->randomElement(['reproduksi', 'pubertas']),
            'judul' => $this->faker->text(),
            'deskripsi_materi' => $this->faker->paragraph,
            'gambar' => $this->faker->imageUrl,
            'video_materi' => $this->faker->url,
        ];
    }
}
