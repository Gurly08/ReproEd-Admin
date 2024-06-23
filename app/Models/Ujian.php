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
        'nilai_kehamilan',
        'nilai_perubahan_sosial',
        'hasil',
    ];
}
