<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_guru',
        'id_matpel',
        'id_kelas',
        // 'tanggal',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
        // 'minggu',
    ];

    protected $table = 'absensi';

    public function guru()
    {
        return $this->belongsTo(DataGuru::class, 'id_guru', 'id');
    }

    public function matpel()
    {
        return $this->belongsTo(DataMatpel::class, 'id_matpel', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'id_kelas', 'id');
    }

    public function detailabsensi()
    {
        return $this->hasMany(DetailAbsensi::class, 'id_absensi');
    }
}
