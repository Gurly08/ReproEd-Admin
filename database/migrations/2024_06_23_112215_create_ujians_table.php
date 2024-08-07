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
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            //user_id
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //nilai kesehatan reproduksi, penyebab_kehamilan, dan nilai perubahan emosi
            $table->integer('nilai_kesehatan_reproduksi')->nullable();
            $table->integer('nilai_penyebab_kehamilan')->nullable();
            $table->integer('nilai_perubahan_emosi')->nullable();
            //hasil
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};
