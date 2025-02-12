<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangPesantren extends Model
{
    use HasFactory;
    protected $table = 'tentang_pesantren';
    protected $fillable = ['judul', 'deskripsi', 'foto', 'keterangan_video', 'link_video'];
}
