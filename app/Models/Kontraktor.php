<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    protected $table = 'kontraktor';
    protected $primaryKey = 'kontraktor_id';

    protected $fillable = [
        'id_proyek',
        'nama_kontraktor',
        'penanggung_jawab',
        'kontak',
        'alamat'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }
}

