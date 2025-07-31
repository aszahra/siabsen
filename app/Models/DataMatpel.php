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

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_matpel');
    }
}
