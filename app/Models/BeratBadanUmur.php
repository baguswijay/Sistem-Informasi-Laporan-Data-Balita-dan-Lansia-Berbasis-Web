<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeratBadanUmur extends Model
{
    use HasFactory;

    protected $table = 'berat_badan_umur';
    // protected $guarded = [];

    protected $fillable = [
        'umur_bulan',
        'jenis_kelamin',
        'L',
        'M',
        'S',
        '-3sd',
        '-2sd',
        '-1sd',
        'median',
        '+1sd',
        '+2sd',
        '+3sd',
    ];
}
