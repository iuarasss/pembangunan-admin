<?php
namespace App\Models;

use App\Models\Tahapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyek extends Model
{
    use HasFactory;

    protected $table      = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $fillable   = ['kode_proyek', 'nama_proyek', 'tahun', 'lokasi', 'anggaran', 'sumber_dana', 'deskripsi', 'progress'];

    public function tahapan()
    {
        return $this->hasMany(Tahapan::class, 'id_proyek', 'id_proyek');
    }
}
