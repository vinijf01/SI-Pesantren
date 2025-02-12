<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'hero'; // Nama tabel sesuai dengan yang Anda tentukan di migration

    protected $fillable = [
        'judul',
        'isi',
        'image',
        'link_fb',
        'link_ig',
        'link_yt',
        'keterangan_tombol',
        'link_btn',
    ];

    // Jika Anda memiliki kolom-kolom tanggal (created_at, updated_at), gunakan properti timestamps
    public $timestamps = true;

    // Jika Anda memiliki kolom-kolom tanggal tertentu, gunakan properti dates
    // protected $dates = ['created_at', 'updated_at'];

    // Jika Anda memiliki relasi dengan model lain, definisikan di sini

    // Contoh relasi one-to-many dengan model lain
    // public function relatedModel()
    // {
    //     return $this->hasMany(RelatedModel::class);
    // }
}
