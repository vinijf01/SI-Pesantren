<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroPPDB extends Model
{
    use HasFactory;

    protected $table = 'hero_ppdb';

    protected $fillable = [
        'nama_pesantren',
        'judul',
        'ta',
        'link_btn',
        'image',
    ];
}
