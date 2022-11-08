<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJenisAnggaran extends Model
{
    protected $table = "detail_jenis_anggaran";
    protected $guarded = [];

    use HasFactory;

    public function kelompok_jenis_anggaran()
    {
        return $this->belongsTo(KelompokJenisAnggaran::class);
    }

    public function jenis_anggaran()
    {
        return $this->belongsTo(JenisAnggaran::class);
    }

    public function anggaran_realisasi()
    {
        return $this->hasMany(AnggaranRealisasi::class);
    }
}
