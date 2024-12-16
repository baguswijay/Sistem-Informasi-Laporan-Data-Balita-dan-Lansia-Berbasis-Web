<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $casts = [
        'birth_date' => 'date',
    ];
    protected $fillable = [
        'nama',
        'ayah',
        'ibu',
        'jenis_kelamin',
        'birth_date',
        'umur',
        'kategori',
        'bpjs',
        'anak_ke',
        'nik',
        'bbl',
        'no_kk',
        'imd',
        'no_hp',
        'no_rumah',
        'rt',
        'rw',
        'pbl',
        'jam_lahir'
    ];

    public function hasilPemeriksaan(): HasMany
    {
        return $this->hasMany(HasilPemeriksaan::class);
    }
}
