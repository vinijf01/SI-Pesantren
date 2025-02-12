<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    use HasFactory;

    protected $table = 'hafalan';

    protected $fillable = [
        'id_santri',
        'tanggal',
        'surat',
        'ayat',
        'total_hafalan',
    ];

    // Relasi dengan tabel users (santri)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_santri', 'id_santri_fk');
    }
}
