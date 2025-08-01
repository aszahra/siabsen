<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jadwal',
        'id_guru',
        'tanggal',
    ];

    protected $table = 'absensi';

    public function absensi()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(DataGuru::class, 'id_guru', 'id');
    }

    public function detailabsensi()
    {
        return $this->hasMany(DetailAbsensi::class, 'id_absensi');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
    }
}
