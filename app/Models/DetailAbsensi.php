<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAbsensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'status',
    ];

    protected $table = 'detail_absensi';

    public function siswa()
    {
        return $this->belongsTo(DataSiswa::class, 'id_siswa', 'id');
    }
}
