<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_guru',
        'id_matpel',
        'id_kelas',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
    ];

    protected $table = 'jadwal';

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

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_jadwal');
    }
}
