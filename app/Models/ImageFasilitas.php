<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageFasilitas extends Model
{
    use HasFactory;

    protected $table = 'image_fasilitas';
    protected $fillable = ['id_fasilitas', 'image'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }
}
