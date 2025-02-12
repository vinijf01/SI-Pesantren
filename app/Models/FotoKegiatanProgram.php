<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKegiatanProgram extends Model
{
    use HasFactory;

    protected $table = 'foto_kegiatan_program';
    protected $fillable = ['id_program', 'foto', 'keterangan'];

    public function program()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
