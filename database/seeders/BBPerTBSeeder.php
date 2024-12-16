<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Imports\BBPerTBImport;
class BBPerTBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $importer = new BBPerTBImport();
        $importer->import(storage_path('app/public/BB per TB Fix.xlsx'));
    }
}
