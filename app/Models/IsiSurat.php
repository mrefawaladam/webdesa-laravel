<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiSurat extends Model
{
    use HasFactory;
    protected $table = 'isi_surat';
    protected $guarded = [];


    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }
}
