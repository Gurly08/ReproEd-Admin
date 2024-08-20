<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nilai_kesehatan_reproduksi',
        'nilai_penyebab_kehamilan',
        'nilai_perubahan_emosi',
        'hasil',
        'status_kesehatan_reproduksi',
        'status_penyebab_kehamilan',
        'status_perubahan_emosi',
        'timer_kesehatan_reproduksi',
        'timer_penyebab_kehamilan',
        'timer_perubahan_emosi',
    ];
}
