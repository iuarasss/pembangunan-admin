<?php

namespace App\Models;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Model;

class ProgresProyek extends Model
{
    protected $table = 'progres_proyek';
    protected $primaryKey = 'progres_id';

    protected $fillable = [
        'id_proyek',
        'tahap_id',
        'persen_real',
        'tanggal',
        'catatan'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }
}

