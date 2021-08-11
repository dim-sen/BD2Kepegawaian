<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongans extends Model
{
    use HasFactory;
    protected $fillable = ['id_golongan', 'gaji_pokok', 'tunjangan_pasangan', 'tunjangan_anak', 'tunjangan_transport'];
}
