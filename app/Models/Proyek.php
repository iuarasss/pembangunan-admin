<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table    = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $fillable = ['kode_proyek', 'nama_proyek', 'tahun', 'lokasi', 'anggaran', 'sumber_dana', 'deskripsi', 'progress'];
}
