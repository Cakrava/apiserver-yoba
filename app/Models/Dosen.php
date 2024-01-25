<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = "dosen2010041";
    protected $primaryKey = 'nidn2010041';
    protected $keyType = 'string';
    protected $fillable = [
        'nidn2010041',
        'namalengkap2010041',
        'jenkel2010041',
        'tmp_lahir2010041',
        'tgl_lahir2010041',
        'alamat2010041',
        'notelp2010041',
        'foto',
        'foto_thumb',


    ];
}
