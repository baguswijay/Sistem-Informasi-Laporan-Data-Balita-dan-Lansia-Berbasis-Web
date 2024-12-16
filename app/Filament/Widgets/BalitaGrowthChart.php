<?php

namespace App\Filament\Widgets;

use App\Models\BeratBadanUmur;
use App\Models\HasilPemeriksaan;
use App\Models\Pasien;
use App\Services\AntropometriCalculator;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\CanPoll;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BalitaGrowthChart extends ApexChartWidget
{
    use CanPoll;
    protected static ?string $heading = 'Grafik Pertumbuhan Balita';
    protected static ?string $chartId = 'balitaGrowthChart';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $loadingIndicator = 'Loading...';

    protected static ?int $sort = 2;

    public ?int $recordId = null;
    protected array $data = [];

    protected function getOptions(): array
    {
        $balita = Pasien::find($this->recordId);

        if (!$balita) {
            return [];
        }

        $calculator = new AntropometriCalculator();

        $hasilPemeriksaan = $balita->hasilPemeriksaan()
            ->orderBy('created_at')
            ->get();

        $this->data = $hasilPemeriksaan->map(function ($pemeriksaan) use ($balita, $calculator) {
            $median = BeratBadanUmur::where('umur_bulan', $pemeriksaan->umur)
                ->where('jenis_kelamin', $balita->jenis_kelamin)
                ->value('median');
            $min1SD = BeratBadanUmur::where('umur_bulan', $pemeriksaan->umur)
                ->where('jenis_kelamin', $balita->jenis_kelamin)
                ->value('-1sd');
            $plus1SD = BeratBadanUmur::where('umur_bulan', $pemeriksaan->umur)
                ->where('jenis_kelamin', $balita->jenis_kelamin)
                ->value('+1sd');

            $bbUmurResult = $calculator->calculateBBUmur($pemeriksaan->bb, $median, $min1SD, $plus1SD);

            return [
                'x' => $pemeriksaan->umur,
                'y' => $pemeriksaan->bb,
                'status' => $bbUmurResult['status'],
                'color' => $bbUmurResult['color'],
            ];
        })->toArray();

        // Ambil data standar dari tabel berat_badan_umur
        $standardData = BeratBadanUmur::where('jenis_kelamin', $balita->jenis_kelamin)
            ->orderBy('umur_bulan')
            ->get();

        $medianData = $standardData->map(function ($item) {
            return ['x' => $item->umur_bulan, 'y' => $item->median];
        })->toArray();

        $sdMinus3Data = $standardData->map(function ($item) {
            return ['x' => $item->umur_bulan, 'y' => $item['-3sd']];
        })->toArray();

        $sdPlus3Data = $standardData->map(function ($item) {
            return ['x' => $item->umur_bulan, 'y' => $item['+3sd']];
        })->toArray();

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Berat Badan Balita',
                    'data' => array_map(function ($item) {
                        return ['x' => $item['x'], 'y' => $item['y']];
                    }, $this->data),
                ],
                [
                    'name' => 'Median',
                    'data' => $medianData,
                ],
                [
                    'name' => '-3 SD',
                    'data' => $sdMinus3Data,
                ],
                [
                    'name' => '+3 SD',
                    'data' => $sdPlus3Data,
                ],
            ],
            'xaxis' => [
                'title' => ['text' => 'Umur (bulan)'],
                'type' => 'numeric',
            ],
            'yaxis' => [
                'title' => ['text' => 'Berat Badan (kg)'],
            ],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'title' => [
                'text' => 'Grafik Pertumbuhan Balita',
                'align' => 'center',
            ],
            'markers' => [
                'size' => 5,
            ],
            'tooltip' => [
                'shared' => false,
                'intersect' => true,
                'custom' => <<<JS
                        function({series, seriesIndex, dataPointIndex, w}) {
                            let status = {$this->getStatusJson()};
                            let point = status[dataPointIndex];
                            if (point) {
                                return '<div class="arrow_box">' +
                                    '<span style="color:' + point.color + '">' + point.status + '</span><br>' +
                                    'Umur: ' + point.x + ' bulan<br>' +
                                    'BB: ' + point.y + ' kg' +
                                    '</div>';
                            }
                            return '';
                        }
                    JS,
            ],
        ];
    }

    protected function getStatusJson(): string
    {
        return json_encode($this->data);
    }

    // $dates = $hasilPemeriksaan->pluck('created_at')->map(function ($date) {
    //     return $date->format('Y-m-d');
    // })->toArray();

    // $bbData = $hasilPemeriksaan->pluck('bb')->toArray();
    // $tbData = $hasilPemeriksaan->pluck('tb')->toArray();

    // return [
    //     'chart' => [
    //         'type' => 'line',
    //         'height' => 300,
    //         'background' => '#f5f5f5',
    //     ],
    //     'series' => [
    //         [
    //             'name' => 'Berat Badan (kg)',
    //             'data' => $bbData,
    //         ],
    //         [
    //             'name' => 'Tinggi Badan (cm)',
    //             'data' => $tbData,
    //         ],
    //     ],
    //     'xaxis' => [
    //         'categories' => $dates,
    //         'labels' => [
    //             'rotate' => -45,
    //             'rotateAlways' => true,
    //         ],
    //     ],
    //     'yaxis' => [
    //         [
    //             'title' => [
    //                 'text' => 'Berat Badan (kg)',
    //             ],
    //         ],
    //         [
    //             'opposite' => true,
    //             'title' => [
    //                 'text' => 'Tinggi Badan (cm)',
    //             ],
    //         ],
    //     ],
    //     'stroke' => [
    //         'curve' => 'smooth',
    //     ],
    //     'title' => [
    //         'text' => 'Grafik Pertumbuhan Balita',
    //         'align' => 'center',
    //     ],
    //     'responsive' => [
    //         [
    //             'breakpoint' => 1000,
    //             'options' => [
    //                 'chart' => [
    //                     'height' => 300
    //                 ],
    //             ],
    //         ]
    //     ],
    // ];


    // protected function getType(): string
    // {
    //     return 'line';
    // }
}
