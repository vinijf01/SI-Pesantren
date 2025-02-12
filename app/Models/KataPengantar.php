<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataPengantar extends Model
{
    use HasFactory;
    protected $table = 'kata_pengantar';

    protected $fillable = [
        'keterangan',
        'kata_pengantar',
        'foto',
    ];
}
