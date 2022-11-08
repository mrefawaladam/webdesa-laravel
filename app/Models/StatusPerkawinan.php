<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    use HasFactory;
    protected $table = "status_perkawinan";
    protected $guarded = [];


    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
