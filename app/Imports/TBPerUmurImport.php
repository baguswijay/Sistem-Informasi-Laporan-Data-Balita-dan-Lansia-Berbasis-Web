<?php

namespace App\Imports;

use App\Models\TBPerUmur;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TBPerUmurImport
{
    public function import($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $header = true;
        foreach ($rows as $row) {
            if ($header) {
                $header = false;
                continue;
            }

            TBPerUmur::create([
                'umur_bulan' => $row[0],
                'jenis_kelamin' => $row[1],
                'kondisi_badan' => $row[2],
                'L' => $row[3],
                'M' => $row[4],
                'S' => $row[5],
                'SD' => $row[6],
            ]);
        }
    }
}
