<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_santri',
        'semester',
        'file_raport',
    ];

    // Relasi dengan tabel User (santri)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_santri', 'id_santri_fk');
    }
}
