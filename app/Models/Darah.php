<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darah extends Model
{

    protected $table = "darah";
    protected $guarded = [];

    use HasFactory;

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
