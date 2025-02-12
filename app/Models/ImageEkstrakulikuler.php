<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageEkstrakulikuler extends Model
{
    use HasFactory;
    protected $table = 'image_ekstrakulikulers';
    protected $fillable = ['id_ekstrakulikuler', 'nama_kegiatan', 'foto_kegiatan'];

    public function ekstrakulikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class, 'id_ekstrakulikuler');
    }
}
