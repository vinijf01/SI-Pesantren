<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuantitatif extends Model
{
    use HasFactory;

    protected $table = 'kuantitatif';
    protected $fillable = ['jumlah', 'keterangan'];
}
