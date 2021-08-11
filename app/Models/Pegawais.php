<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawais extends Model
{
    use HasFactory;
    protected $fillable = ['nip', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_telp', 'alamat', 'status_nikah', 'jumlah_anak', 'id_golongan'];

    public function golongans(): BelongsTo {
        return $this -> belongsTo(Golongans::class, 'id_golongan', 'id');
    }
}
