<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tb',
        'bb',
        'umur',
        'bb_umur',
        'tb_umur',
        'status_gizi',
        'vitamin',
        'imunisasi',
        'lingkar_lengan',
        'lingkar_kepala',
        'lingkar_perut',
        'asi',
        'bb_umur_color',
        'tb_umur_color',
        'status_gizi_color',
        'keterangan',
        'kondisi_badan',
        'tensi'
    ];
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }
}
