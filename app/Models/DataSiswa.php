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
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'nama_ortu',
        'statuss',
    ];

    protected $table = 'data_siswa';

    public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'id_kelas', 'id');
    }

    public function detailabsensi()
    {
        return $this->hasMany(Absensi::class, 'id_siswa');
    }
}
