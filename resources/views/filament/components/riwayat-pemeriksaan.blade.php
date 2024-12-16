<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tanggal Pemeriksaan
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Hasil
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Keterangan
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        {{-- @foreach ($hasilPemeriksaan as $hasil)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->tanggal_pemeriksaan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->hasil }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->keterangan }}
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>


<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tanggal Pemeriksaan
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Hasil
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Keterangan
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        {{-- <pre>{{ print_r($data['hasilPemeriksaan']) }}</pre> --}}
        {{-- @if (isset($data) && isset($data['hasilPemeriksaan']))
            @foreach ($data['hasilPemeriksaan'] as $hasil)
                <p>{{ $hasil->bb }}</p>
            @endforeach
        @else
            <p>Tidak ada data hasil pemeriksaan.</p>
        @endif --}}
        {{-- @foreach ($hasilPemeriksaan as $hasil)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->bb }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->tb }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hasil->status_gizi }}
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
