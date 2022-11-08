<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokJenisAnggaran extends Model
{
    use HasFactory;
    protected $table = "kelompok_jenis_anggaran";
    protected $guarded = [];


    public function jenis_anggaran()
    {
        return $this->belongsTo(JenisAnggaran::class);
    }

    public function detail_kelompok_jenis_anggaran()
    {
        return $this->hasMany(DetailJenisAnggaran::class);
    }
}
