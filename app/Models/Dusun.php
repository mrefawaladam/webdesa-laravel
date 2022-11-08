<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = "dusun";
    protected $guarded = [];

    use HasFactory;

    public function detailDusun()
    {
        return $this->hasMany(DetailDusun::class);
    }
}
