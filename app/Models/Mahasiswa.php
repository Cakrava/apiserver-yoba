<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = "mahasiswa_2010041";
    protected $primaryKey = 'nim_2010041';
    protected $keyType = 'string';
    protected $fillable = [
        'nim_2010041',
        'nama_lengkap_2010041',
        'jenis_kelamin_2010041',
        'tmp_lahir_2010041',
        'tgl_lahir_2010041',
        'alamat_2010041',
        'notelp_2010041',
        'foto',
        'foto_thumb',

    ];

}
