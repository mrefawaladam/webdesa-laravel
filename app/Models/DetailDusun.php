<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDusun extends Model
{
    protected $table = "detail_dusun";
    protected $guarded = [];

    use HasFactory;

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}
