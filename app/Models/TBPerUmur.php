<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBPerUmur extends Model
{
    use HasFactory;
    protected $table = 't_b_per_umurs';
    protected $fillable = [
       'umur_bulan',
       'jenis_kelamin',
       'kondisi_badan',
       'L',
       'M',
       'S',
       'SD'
    ];
    
}
