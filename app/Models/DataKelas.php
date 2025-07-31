<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tingkat',
        'sub_kelas',
    ];

    protected $table = 'data_kelas';

    public function siswa()
    {
        return $this->hasMany(DataSiswa::class, 'id_kelas');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_kelas');
    }
}
