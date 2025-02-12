<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKegiatanProgram extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kegiatan_program';
    protected $fillable = ['id_program', 'jam', 'kegiatan'];

    public function program()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
