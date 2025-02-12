<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTahunanCalonSantri extends Model
{
    use HasFactory;

    protected $table = 'laporan_tahunan_calon_santri';

    protected $fillable = [
        'T_A',
        'laporan',
    ];
}
