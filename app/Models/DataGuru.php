<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'id_user',
        // 'email',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'no_telp',
        'agama',
        'alamat',
        'statuss',
    ];

    protected $table = 'data_guru';

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_guru');
    }

    // public function absensi()
    // {
    //     return $this->hasMany(Absensi::class, 'id_guru');
    // }
}
