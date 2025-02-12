<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSantri extends Model
{
    use HasFactory;
    protected $table = 'calon_santri';
    protected $fillable = [
        'id_program',
        'nama_lengkap',
        'jenis_kelamin',
        'no_wa',
        'usia',
        'sk_sekolah',
        'kk',
        'akta',
        'ktp',
        'pasphoto',
        'raport',
        'status',
        'TA',
        'bukti_pembayaran'
    ];

    public function program()
    {
        return $this->belongsTo(ProgramAkademik::class, 'id_program');
    }
}
