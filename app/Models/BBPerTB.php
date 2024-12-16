<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BBPerTB extends Model
{
    use HasFactory;

    protected $table = 'b_b_per_t_b_s';

    protected $fillable = [
        'jenis_kelamin',
        'indeks',
        'tinggi_badan',
        'L',
        'M',
        'S',
    ];
}
