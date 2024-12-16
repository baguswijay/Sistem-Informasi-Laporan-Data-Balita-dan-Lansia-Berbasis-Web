<?php

namespace App\Imports;

use App\Models\BBPerTB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BBPerTBImport
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

            BBPerTB::create([
                'jenis_kelamin' => $row[0],
                'indeks' => $row[1],
                'tinggi_badan' => $row[2],
                'L' => $row[3],
                'M' => $row[4],
                'S' => $row[5],
            ]);
        }
    }
}
