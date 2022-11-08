<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAnggaran extends Model
{
    protected $table = "jenis_anggaran";
    protected $guarded = [];

    use HasFactory;
}
