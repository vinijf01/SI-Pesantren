<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPendidikan extends Model
{
    use HasFactory;
    protected $table = 'biaya_pendidikan';

    protected $fillable = [
        'judul',
        'deskripsi',
    ];
}
