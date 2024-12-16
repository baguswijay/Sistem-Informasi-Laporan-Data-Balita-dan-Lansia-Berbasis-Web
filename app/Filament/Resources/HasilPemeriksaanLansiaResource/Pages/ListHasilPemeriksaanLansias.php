<?php

namespace App\Filament\Resources\HasilPemeriksaanLansiaResource\Pages;

use App\Filament\Resources\HasilPemeriksaanLansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilPemeriksaanLansias extends ListRecords
{
    protected static string $resource = HasilPemeriksaanLansiaResource::class;

    public function getTitle(): string 
    {
        return 'Pemeriksaan Lansia';
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
