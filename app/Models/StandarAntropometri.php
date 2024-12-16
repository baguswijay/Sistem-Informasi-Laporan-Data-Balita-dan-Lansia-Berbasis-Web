<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarAntropometri extends Model
{
    use HasFactory;

    protected $table = 'standar_antropometris';
    protected $fillable = [
        'jenis_kelamin',
        'umur_bulan',
        'indeks',
        'median',
        'sd_negatif_1',
        'sd_negatif_2',
        'sd_negatif_3',
        'sd_positif_1',
        'sd_positif_2',
        'sd_positif_3'
    ];
}
