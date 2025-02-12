<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAkademik extends Model
{
    use HasFactory;
    protected $table = 'program_akademik';
    protected $fillable = ['nama_program', 'deskripsi_singkat', 'deskripsi', 'kategori', 'logo', 'spp'];
}
