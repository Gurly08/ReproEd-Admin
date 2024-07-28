<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('judul'); // kolom judul
            $table->text('deskripsi_materi'); // kolom deskripsi materi
            $table->string('gambar')->nullable(); // kolom gambar, boleh kosong
            $table->string('video_materi')->nullable(); // kolom video materi, boleh kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
