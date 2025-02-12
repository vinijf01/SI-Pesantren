<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetClass extends Model
{
    use HasFactory;

    protected $table = 'ket_class';
    protected $fillable = ['id_program', 'judul_1', 'deskripsi_judul_1', 'judul_2', 'deskripsi_judul_2', 'image'];

    public function program()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
