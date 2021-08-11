<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gajis extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_gaji', 'potongan', 'total_gaji', 'tanggal_gaji', 'nip'];

    public function pegawais(): BelongsTo {
        return $this -> belongsTo(Pegawais::class, 'nip', 'id');
    }
}
