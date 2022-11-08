<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    protected $table = "status_perkawinan";
    protected $guarded = [];

    use HasFactory;

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
