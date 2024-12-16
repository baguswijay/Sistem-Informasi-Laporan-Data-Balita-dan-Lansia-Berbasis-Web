<?php

namespace App\Traits;

use App\Models\BeratBadanUmur;
use App\Models\TBPerUmur;
use App\Models\BBPerTB;

trait StatusAntropometriTrait
{
    protected function hitungStatusAntropometri(array $data): array
    {
        $median = BeratBadanUmur::where('umur_bulan', $data['umur'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->value('M');

        $L = BeratBadanUmur::where('umur_bulan', $data['umur'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->value('L');

        $S = BeratBadanUmur::where('umur_bulan', $data['umur'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->value('S');

        // $medianTB = TBPerUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('kondisi_badan', $data['kondisi_badan'])
        //     ->value('median');

        $M = TBPerUmur::where('umur_bulan', $data['umur'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('kondisi_badan', $data['kondisi_badan'])
            ->value('M');

        $SD = TBPerUmur::where('umur_bulan', $data['umur'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('kondisi_badan', $data['kondisi_badan'])
            ->value('SD');

        $median23 = BBPerTB::where('indeks', '0-23')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            ->value('M');

        $Lbb23 = BBPerTB::where('indeks', '0-23')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            // ->where('kondisi_badan', $data['kondisi_badan'])
            ->value('L');

        $Sbb23 = BBPerTB::where('indeks', '0-23')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            ->value('S');

        $median60 = BBPerTB::where('indeks', '24-60')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            ->value('M');

        $Lbb60 = BBPerTB::where('indeks', '24-60')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            ->value('L');

        $Sbb60 = BBPerTB::where('indeks', '24-60')
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->where('tinggi_badan', $data['tb'])
            ->value('S');

        // $data['bb_umur'] = $this->hitungBBUmur($data['bb'], $median, $min1SD, $plus1SD);
        // $data['tb_umur'] = $this->hitungTBUmur($data['tb'], $medianTB, $min1SDTB, $plus1SDTB);
        // $data['status_gizi'] = $this->hitungStatusGizi($data['umur'], $data['bb'], $median23, $min1SD23, $plus1SD23, $median60, $min1SD60, $plus1SD60);
        // dd($data);

        $bbUmurResult = $this->hitungBBUmur($data['bb'], $median, $L, $S);
        $data['bb_umur'] = $bbUmurResult['status'];
        $data['bb_umur_color'] = $bbUmurResult['color'];

        $tbUmurResult = $this->hitungTBUmur($data['tb'], $M, $SD);
        $data['tb_umur'] = $tbUmurResult['status'];
        $data['tb_umur_color'] = $tbUmurResult['color'];

        $statusGiziResult = $this->hitungStatusGizi($data['umur'], $data['bb'], $data['kondisi_badan'],$median23, $Lbb23, $Sbb23, $median60, $Lbb60, $Sbb60);
        $data['status_gizi'] = $statusGiziResult['status'];
        $data['status_gizi_color'] = $statusGiziResult['color'];
        return $data;
    }
    protected function hitungBBUmur($bb, $median, $L, $S): array
    {
        // if ($bb < $median) {
        //     $hitung = ($bb - $median) / ($median - $min1SD);
        // } elseif ($bb > $median) {
        //     $hitung = ($bb - $median) / ($plus1SD - $median);
        // } else {
        //     $hitung = ($bb - $median) / $median;
        // }
        // dd($hitung);
        $hitung = ((($bb / $median) ** $L) - 1) / ($L * $S);
        // $hitung2 = $hitung1 - 1;
        // $hitung3 = $hitung2 / ($L * $S);
        // $hitung = $hitung3;
        // dd($hitung);
        if ($hitung < -3) {
            return ['status' => 'BB Sangat Kurang', 'color' => 'darkred'];
        } elseif ($hitung >= -3 && $hitung < -2) {
            return ['status' => 'BB Kurang', 'color' => 'red'];
        } elseif ($hitung >= -2 && $hitung < 1) {
            return ['status' => 'BB Normal', 'color' => 'green'];
        } else {
            return ['status' => 'BB Berlebih', 'color' => 'red'];
        } 
    }
    protected function hitungTBUmur($tb, $M, $SD): array
    {
        // if ($tb < $medianTB) {
        //     $hitung = ($tb - $medianTB) / ($medianTB - $min1SDTB);
        // } elseif ($tb > $medianTB) {
        //     $hitung = ($tb - $medianTB) / ($plus1SDTB - $medianTB);
        // } else {
        //     $hitung = ($tb - $medianTB) / $medianTB;
        // }
        $hitung = ($tb - $M) / $SD;
        // dd($hitung, $M, $SD);
        if ($hitung < -3) {
            return ['status' => 'Sangat Pendek', 'color' => 'darkred'];
        } elseif ($hitung >= -3 && $hitung < -2) {
            return ['status' => 'Pendek', 'color' => 'red'];
        } elseif ($hitung >= -2 && $hitung < 1) {
            return ['status' => 'Normal', 'color' => 'green'];
        } elseif ($hitung > 1 && $hitung <= 2) {
            return ['status' => 'Normal', 'color' => 'green'];
        } elseif ($hitung > 2 && $hitung <= 3) {
            return ['status' => 'Normal', 'color' => 'green'];
        } else {
            return ['status' => 'Tinggi', 'color' => 'blue'];
        }
    }
    protected function hitungStatusGizi($umur, $bb, $badan, $median23, $Lbb23, $Sbb23, $median60, $Lbb60, $Sbb60): array
    {
        if ($umur <= 24 && $badan == 'telentang') {
            $median = $median23;
            $L = $Lbb23;
            $S = $Sbb23;
        } else {
            $median = $median60;
            $L = $Lbb60;
            $S = $Sbb60;
        }


        // if ($bb < $median) {
        //     $hitung = ($bb - $median) / ($median - $min1SD);
        // } elseif ($bb > $median) {
        //     $hitung = ($bb - $median) / ($plus1SD - $median);
        // } else {
        //     $hitung = ($bb - $median) / $median;
        // }
        // if ($bb > $median) {
        //     $hitung = ($bb - $median) / ($plus1SD - $median);
        // }
        // dd($bb, $median, $min1SD, $plus1SD, $hitung);
        // dd($hitung);
        $hitung = ((($bb / $median) ** $L) - 1) / ($L * $S);
        // dd($hitung);
        if ($hitung < -3) {
            return ['status' => 'Gizi Buruk', 'color' => 'darkred'];
        } elseif ($hitung >= -3 && $hitung < -2) {
            return ['status' => 'Gizi Kurang', 'color' => 'red'];
        } elseif ($hitung >= -2 && $hitung < 1) {
            return ['status' => 'Gizi Baik', 'color' => 'green'];
        } elseif ($hitung > 1 && $hitung <= 2) {
            return ['status' => 'Beresiko Gizi Lebih', 'color' => 'yellow'];
        } elseif ($hitung > 2 && $hitung <= 3) {
            return ['status' => 'Gizi Lebih', 'color' => 'red'];
        } else {
            return ['status' => 'Obesitas', 'color' => 'darkred'];
        }
    }
}
