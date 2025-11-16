<?php
namespace App\Models;
use App\Models\Proyek;
use Illuminate\Database\Eloquent\Model;

class Tahapan extends Model
{
    protected $table = 'tahapan_proyek';
    protected $primaryKey = 'tahap_id';

    protected $fillable = [
        'proyek_id',
        'nama_tahap',
        'target_persen',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'id_proyek');
    }
}
