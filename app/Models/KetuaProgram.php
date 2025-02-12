<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaProgram extends Model
{
    use HasFactory;
    protected $table = 'ketua_program';
    protected $fillable = ['id_program', 'nama', 'profil'];

    public function program()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
