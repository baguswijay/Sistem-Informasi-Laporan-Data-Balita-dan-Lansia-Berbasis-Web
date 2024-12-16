<?php

namespace Database\Seeders;

use App\Imports\BBPerUmurImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BBPerUmurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $importer = new BBPerUmurImport;
        $importer->import(storage_path('app/public/BB Per Umur Fix.xlsx'));
    }
}
