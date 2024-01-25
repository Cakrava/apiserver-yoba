<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = "matakuliah2010041";
    protected $primaryKey = 'kdmatkul2010041';
    protected $keyType = 'string';
    protected $fillable = [
        'kdmatkul2010041',
        'namamat2010041',
        'sks2010041',
        'foto',
        'foto_thumb',

    ];
}
