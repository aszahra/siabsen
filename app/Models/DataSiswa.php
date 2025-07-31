<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'id_kelas',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir',
        'status',
    ];

    protected $table = 'data_siswa';

    public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'id_kelas', 'id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_siswa');
    }
}
