<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'cara_pendaftaran';
    protected $fillable = ['step', 'nama_step', 'deskripsi', 'logo'];
}
