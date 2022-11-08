<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darah extends Model
{
    use HasFactory;
    protected $table = "darah";
    protected $guarded = [];


    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
