<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    protected $table = 'kontraktor';
    protected $primaryKey = 'kontraktor_id';

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id_proyek',
        'nama_kontraktor',
        'penanggung_jawab',
        'kontak',
        'alamat'
    ];
}


