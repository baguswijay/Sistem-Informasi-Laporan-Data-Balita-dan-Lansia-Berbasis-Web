<?php

namespace App\Filament\Resources\HasilPemeriksaanResource\Pages;

use App\Filament\Resources\HasilPemeriksaanResource;
use App\Models\BBPerTB;
use App\Models\BeratBadanUmur;
use App\Models\TBPerUmur;
use App\Traits\StatusAntropometriTrait;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHasilPemeriksaan extends CreateRecord
{
    use StatusAntropometriTrait;
    protected static string $resource = HasilPemeriksaanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): string|null
    {
        return 'Data Hasil Pemeriksaan Berhasil Ditambahkan';
    }

    public function getTitle(): string
    {
        return 'Tambah Pemeriksaan';
    }
    protected function getCreateButtonLabel(): string
    {
        return 'Tambah Pemeriksaan';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->hitungStatusAntropometri($data);
        // $median = BeratBadanUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('median');

        // $min1SD = BeratBadanUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('-1sd');

        // $plus1SD = BeratBadanUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('+1sd');

        // $medianTB = TBPerUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('median');

        // $min1SDTB = TBPerUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('-1sd');

        // $plus1SDTB = TBPerUmur::where('umur_bulan', $data['umur'])
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->value('+1sd');

        // $median23 = BBPerTB::where('indeks', '0-23')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('median');

        // $min1SD23 = BBPerTB::where('indeks', '0-23')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('-1sd');

        // $plus1SD23 = BBPerTB::where('indeks', '0-23')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('+1sd');

        // $median60 = BBPerTB::where('indeks', '24-60')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('median');

        // $min1SD60 = BBPerTB::where('indeks', '24-60')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('-1sd');

        // $plus1SD60 = BBPerTB::where('indeks', '24-60')
        //     ->where('jenis_kelamin', $data['jenis_kelamin'])
        //     ->where('tinggi_badan', $data['tb'])
        //     ->value('+1sd');

        // if ($data['bb'] < $median) {
        //     $hitung = ($data['bb'] - $median) / ($median - $min1SD);
        //     if ($hitung < -3) {
        //         $data['bb_umur'] = 'BB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['bb_umur'] = 'BB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['bb_umur'] = 'BB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['bb_umur'] = 'BB Berlebih';
        //     } else {
        //         $data['bb_umur'] = 'BB Sangat Berlebih';
        //     }
        // } elseif ($data['bb'] > $median) {
        //     $hitung = ($data['bb'] - $median) / ($median - $plus1SD);
        //     if ($hitung < -3) {
        //         $data['bb_umur'] = 'BB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['bb_umur'] = 'BB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['bb_umur'] = 'BB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['bb_umur'] = 'BB Berlebih';
        //     } else {
        //         $data['bb_umur'] = 'BB Sangat Berlebih';
        //     }
        // } else {
        //     $hitung = ($data['bb'] - $median) / $median;
        //     if ($hitung < -3) {
        //         $data['bb_umur'] = 'BB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['bb_umur'] = 'BB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['bb_umur'] = 'BB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['bb_umur'] = 'BB Berlebih';
        //     } else {
        //         $data['bb_umur'] = 'BB Sangat Berlebih';
        //     }
        // }

        // if ($data['tb'] < $medianTB) {
        //     $hitung = ($data['tb'] - $medianTB) / ($medianTB - $min1SDTB);
        //     if ($hitung < -3) {
        //         $data['tb_umur'] = 'TB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['tb_umur'] = 'TB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['tb_umur'] = 'TB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['tb_umur'] = 'TB Berlebih';
        //     } else {
        //         $data['tb_umur'] = 'TB Sangat Berlebih';
        //     }
        // } elseif ($data['tb'] > $medianTB) {
        //     $hitung = ($data['tb'] - $medianTB) / ($medianTB - $plus1SDTB);
        //     if ($hitung < -3) {
        //         $data['tb_umur'] = 'TB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['tb_umur'] = 'TB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['tb_umur'] = 'TB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['tb_umur'] = 'TB Berlebih';
        //     } else {
        //         $data['tb_umur'] = 'TB Sangat Berlebih';
        //     }
        // } else {
        //     $hitung = ($data['tb'] - $medianTB) / $medianTB;
        //     if ($hitung < -3) {
        //         $data['tb_umur'] = 'TB Sangat Kurus';
        //     } elseif ($hitung >= -3 && $hitung < -2) {
        //         $data['tb_umur'] = 'TB Kurang';
        //     } elseif ($hitung >= -2 && $hitung < 1) {
        //         $data['tb_umur'] = 'TB Normal';
        //     } elseif ($hitung > 1 && $hitung <= 2) {
        //         $data['tb_umur'] = 'TB Berlebih';
        //     } else {
        //         $data['tb_umur'] = 'TB Sangat Berlebih';
        //     }
        // }

        // if ($data['umur'] <= 23) {
        //     if ($data['bb'] < $median23) {
        //         $hitung = ($data['bb'] - $median23) / ($median23 - $min1SD23);
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     } elseif ($data['bb'] > $median23) {
        //         $hitung = ($data['bb'] - $median23) / ($median23 - $plus1SD23);
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     } else {
        //         $hitung = ($data['bb'] - $median23) / $median23;
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     }
        // } else {
        //     if ($data['bb'] < $median60) {
        //         $hitung = ($data['bb'] - $median60) / ($median60 - $min1SD60);
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     } elseif($data['bb'] > $median60) {
        //         $hitung = ($data['bb'] - $median60) / ($median60 - $plus1SD60);
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     } else {
        //         $hitung = ($data['bb'] - $median60) / $median60 - $min1SD60;
        //         if ($hitung < -3) {
        //             $data['status_gizi'] = 'Gizi Buruk';
        //         } elseif ($hitung >= -3 && $hitung < -2) {
        //             $data['status_gizi'] = 'Gizi Kurang';
        //         } elseif ($hitung >= -2 && $hitung < 1) {
        //             $data['status_gizi'] = 'Gizi Baik';
        //         } elseif ($hitung > 1 && $hitung <= 2) {
        //             $data['status_gizi'] = 'Gizi Lebih';
        //         } else {
        //             $data['status_gizi'] = 'Obesitas';
        //         }
        //     }
        // }

        // dd($median, $min1SD, $plus1SD, $data['bb'], $data, $medianTB, $min1SDTB, $plus1SDTB);


    }
}
