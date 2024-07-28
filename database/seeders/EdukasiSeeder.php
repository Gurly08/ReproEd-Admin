<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Edukasi;

class EdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Edukasi::factory()->count(20)->create(); // Membuat 10 data dummy untuk Materi
    }
}
