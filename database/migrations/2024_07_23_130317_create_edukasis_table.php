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
        Schema::create('edukasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul_edukasi'); // kolom judul
            $table->text('deskripsi_edukasi'); // kolom deskripsi materi
            $table->string('gambar')->nullable(); // kolom gambar, boleh kosong
            $table->string('video_edukasi')->nullable(); // kolom video materi, boleh kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edukasis');
    }
};
