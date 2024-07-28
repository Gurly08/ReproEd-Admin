<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_edukasi',
        'deskripsi_edukasi',
        'gambar',
        'video_edukasi',
    ];
}
