<?php

namespace Database\Seeders;

use App\Imports\TBPerUmurImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TBPerUmurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $importer = new TBPerUmurImport;
        $importer->import(storage_path('app/public/TB Per Umur Fix.xlsx'));
    }
}
