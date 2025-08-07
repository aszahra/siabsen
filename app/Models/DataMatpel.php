<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMatpel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    protected $table = 'data_matpel';

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_matpel');
    }
}
