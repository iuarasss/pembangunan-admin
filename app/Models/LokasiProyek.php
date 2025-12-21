<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiProyek extends Model
{
    protected $table = 'lokasi_proyek';
    protected $primaryKey = 'lokasi_id';

    protected $fillable = [
        'id_proyek',
        'lat',
        'lng',
        'geojson',
    ];

    protected $casts = [
        'geojson' => 'array',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek', 'id_proyek');
    }
}
