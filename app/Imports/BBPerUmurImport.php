<?php

namespace App\Imports;

use App\Models\BeratBadanUmur;
use App\Models\TBPerUmur;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BBPerUmurImport
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

            BeratBadanUmur::create([
                'umur_bulan' => $row[0],
                'jenis_kelamin' => $row[1],
                'L' => $row[2],
                'M' => $row[3],
                'S' => $row[4],
                '-3sd' => $row[5],
                '-2sd' => $row[6],
                '-1sd' => $row[7],
                'median' => $row[8],
                '+1sd' => $row[9],
                '+2sd' => $row[10],
                '+3sd' => $row[11],
            ]);
        }
    }
}
