<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemeriksaan Lansia</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 95%; margin: auto; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pemeriksaan Lansia</h1>
        
        @foreach($lansias as $lansia)
            <h2>{{ $lansia->nama }} ({{ $lansia->umur }} Tahun)</h2>
            <p>Tanggal Lahir: {{ $lansia->birth_date->isoFormat('D MMMM YYYY') }}</p>
            <p>Jenis Kelamin: {{ $lansia->jenis_kelamin }}</p>
            
            @if($lansia->hasilPemeriksaan->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Lingkar Perut</th>
                            <th>Tensi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lansia->hasilPemeriksaan->sortByDesc('created_at') as $pemeriksaan)
                            <tr>
                                <td>{{ $pemeriksaan->created_at->isoFormat('D MMMM YYYY') }}</td>
                                <td>{{ $pemeriksaan->bb }} kg</td>
                                <td>{{ $pemeriksaan->tb }} cm</td>
                                <td>{{ $pemeriksaan->lingkar_perut }} cm</td>
                                <td>{{ $pemeriksaan->tensi }} mmHg</td>
                                <td>{{ $pemeriksaan->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Belum ada data pemeriksaan untuk lansia ini.</p>
            @endif
        @endforeach
    </div>
</body>
</html>