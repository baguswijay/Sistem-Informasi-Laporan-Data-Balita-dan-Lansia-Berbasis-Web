<?php

namespace App\Filament\Resources\HasilPemeriksaanResource\Pages;

use App\Filament\Resources\HasilPemeriksaanResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Downloaders\Contracts\Downloader;
use Filament\Resources\Pages\ListRecords;

class ListHasilPemeriksaans extends ListRecords
{
    protected static string $resource = HasilPemeriksaanResource::class;
    public function getTitle(): string 
    {
        return 'Pemeriksaan Balita';
    }
    protected function getHeaderActions(): array
    {
        return [
            
            Actions\CreateAction::make(),
        ];
    }
}
