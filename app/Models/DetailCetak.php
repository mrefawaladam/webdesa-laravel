<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCetak extends Model
{
    use HasFactory;
    protected $table = 'detail_cetak';
    protected $guarded = [];


    public function detailCetak()
    {
        return $this->belongsTo(CetakSurat::class);
    }
}
