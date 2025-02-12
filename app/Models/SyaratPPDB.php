<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratPPDB extends Model
{
    use HasFactory;
    protected $table = 'syarat_pendaftaran';
    protected $fillable = ['syarat'];
}
