<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ujian>
 */
class UjianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'nilai_kesehatan_reproduksi' => $this->faker->numberBetween(1,100),
            'nilai_penyebab_kehamilan' => $this->faker->numberBetween(1,100),
            'nilai_perubahan_emosi' => $this->faker->numberBetween(1,100),
            'hasil' => $this->faker->randomElement(['Sangat Paham', 'Kurang Paham', 'Tidak Memahami']),
        ];
    }
}
