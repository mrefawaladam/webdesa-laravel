<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $guarded = [];


    public function isiSurat()
    {
        return $this->hasMany(IsiSurat::class, 'surat_id');
    }

    public function cetakSurat()
    {
        return $this->hasMany(CetakSurat::class, 'surat_id');
    }
}
