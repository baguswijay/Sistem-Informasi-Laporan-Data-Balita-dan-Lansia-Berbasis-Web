@php
    use Carbon\Carbon;

    $bbKurang = 0;
    $bbNormal = 0;
    $bbLebih = 0;

    $pendek = 0;
    $sangatPendek = 0;
    $normal = 0;

    $giziBuruk = 0;
    $giziKurang = 0;
    $giziBaik = 0;

    foreach ($balitas as $balita) {
        if (isset($hasilPemeriksaan[$balita->id]) && count($hasilPemeriksaan[$balita->id]) > 0) {
            $hasilTerakhir = $hasilPemeriksaan[$balita->id]->last();
            if ($hasilTerakhir->bb_umur === 'BB Kurang') {
                $bbKurang++;
            }
            if ($hasilTerakhir->bb_umur === 'BB Normal') {
                $bbNormal++;
            }
            if ($hasilTerakhir->bb_umur === 'BB Lebih') {
                $bbLebih++;
            }
            if ($hasilTerakhir->tb_umur === 'Pendek') {
                $pendek++;
            }
            if ($hasilTerakhir->tb_umur === 'Sangat Pendek') {
                $sangatPendek++;
            }
            if ($hasilTerakhir->tb_umur === 'Normal') {
                $normal++;
            }
            if ($hasilTerakhir->status_gizi === 'Gizi Buruk') {
                $giziBuruk++;
            }
            if ($hasilTerakhir->status_gizi === 'Gizi Kurang') {
                $giziKurang++;
            }
            if ($hasilTerakhir->status_gizi === 'Gizi Baik') {
                $giziBaik++;
            }
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Balita dan Hasil Pemeriksaan</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1em;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .summary {
            margin-bottom: 20px;
        }

        .summary h3 {
            margin-bottom: 10px;
        }

        .summary ul {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Data Balita dan Hasil Pemeriksaan Posyandu Menur - {{ $month }}
        {{ $year }}</h1>

    <div class="summary">
        <h3>Ringkasan:</h3>
        <table>
            <tr>
                <th>Kategori</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>Balita BB Kurang</td>
                <td>{{ $bbKurang }}</td>
            </tr>
            <tr>
                <td>Balita BB Normal</td>
                <td>{{ $bbNormal }}</td>
            </tr>
            <tr>
                <td>Balita BB Lebih</td>
                <td>{{ $bbLebih }}</td>
            </tr>
            <tr>
                <td>Balita Pendek</td>
                <td>{{ $pendek }}</td>
            </tr>
            <tr>
                <td>Balita Sangat Pendek</td>
                <td>{{ $sangatPendek }}</td>
            </tr>
            <tr>
                <td>Balita Normal</td>
                <td>{{ $normal }}</td>
            </tr>
            <tr>
                <td>Balita Gizi Buruk</td>
                <td>{{ $giziBuruk }}</td>
            </tr>
            <tr>
                <td>Balita Gizi Kurang</td>
                <td>{{ $giziKurang }}</td>
            </tr>
            <tr>
                <td>Balita Gizi Baik</td>
                <td>{{ $giziBaik }}</td>
            </tr>
        </table>
    </div>

    @foreach ($balitas as $balita)
        <h2>{{ $balita->nama }}</h2>
        <p>Tanggal Lahir:
            {{ $balita->birth_date ? \Carbon\Carbon::parse($balita->birth_date)->isoformat('D MMMM Y') : 'Tidak ada data' }}
        </p>
        <p>Jenis Kelamin: {{ $balita->jenis_kelamin == 'laki-laki' ? 'Laki-laki' : 'Perempuan' }}</p>

        @if (isset($hasilPemeriksaan[$balita->id]))
            <h3>Hasil Pemeriksaan:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>BB</th>
                        <th>TB</th>
                        <th>Lingkar Kepala</th>
                        <th>Lingkar Lengan</th>
                        <th>BB/U</th>
                        <th>TB/U</th>
                        <th>Status Gizi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilPemeriksaan[$balita->id] as $hasil)
                        <tr>
                            <td>{{ $hasil->created_at->format('d M Y') }}</td>
                            <td>{{ $hasil->bb }}</td>
                            <td>{{ $hasil->tb }}</td>
                            <td>{{ $hasil->lingkar_kepala }}</td>
                            <td>{{ $hasil->lingkar_lengan }}</td>
                            <td>{{ $hasil->bb_umur }}</td>
                            <td>{{ $hasil->tb_umur }}</td>
                            <td>{{ $hasil->status_gizi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada hasil pemeriksaan untuk bulan ini.</p>
        @endif

        <hr>
    @endforeach
</body>

</html>
