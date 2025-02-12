<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminat extends Model
{
    use HasFactory;
    protected $table = 'peminat';

    protected $fillable = [
        'id_program',
        'nama_lengkap',
        'jenis_kelamin',
        'no_wa',
        'tahun_ajaran',
    ];

    public function programAkademik()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
