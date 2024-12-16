<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nama',
        'ayah',
        'ibu',
        'jenis_kelamin',
        'birth_date',
        'umur',
        'kategori',
    ];

    public function hasilPeriksa(): HasMany
    {
        return $this->hasMany(HasilPemeriksaan::class);
    }
}
