<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tgl_lahir',
        'status',
    ];

    protected $table = 'data_guru';

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_guru');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_guru');
    }
}
