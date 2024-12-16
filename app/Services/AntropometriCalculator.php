<?php

namespace App\Services;

use App\Traits\StatusAntropometriTrait;

class AntropometriCalculator
{
    use StatusAntropometriTrait;

    public function calculateBBUmur($bb, $median, $min1SD, $plus1SD)
    {
        return $this->hitungBBUmur($bb, $median, $min1SD, $plus1SD);
    }
}