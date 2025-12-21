<?php
namespace App\Models;

use App\Models\Tahapan;
use App\Models\Kontraktor;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table      = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $guarded    = [];

    public function tahapan()
    {
        return $this->hasMany(Tahapan::class, 'id_proyek', 'id_proyek');
    }
   public function lokasi()
    {
        return $this->hasOne(LokasiProyek::class, 'id_proyek', 'id_proyek');
    }

    public function kontraktor()
    {
        return $this->belongsToMany(
            Kontraktor::class,
            'proyek_kontraktor',
            'id_proyek',
            'id_kontraktor'
        );
    }
     public function progres()
    {
        return $this->hasMany(ProgresProyek::class, 'id_proyek', 'id_proyek');
    }

    public function progresTerakhir()
    {
        return $this->hasOne(ProgresProyek::class, 'id_proyek', 'id_proyek')
                    ->latest('tanggal');
}}
