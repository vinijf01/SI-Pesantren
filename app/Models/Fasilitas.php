<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = ['nama', 'keterangan', 'image'];

    public function images()
    {
        return $this->hasMany(ImageFasilitas::class, 'id_fasilitas');
    }
}
