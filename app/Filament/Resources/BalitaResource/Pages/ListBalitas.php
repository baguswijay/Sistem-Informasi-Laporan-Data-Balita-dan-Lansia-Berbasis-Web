<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Models\Export;
use Filament\Resources\Pages\ListRecords;
// use Filament\Pages\Actions\Action;

class ListBalitas extends ListRecords
{
    protected static string $resource = BalitaResource::class;

    public function getTitle(): string 
    {
        return 'Daftar Balita';
    }
    protected function getHeaderActions(): array
    {
        return [
            // ExportAction::make(),
            Actions\CreateAction::make()
            ->label('Tambah Balita'),
            // Actions\ButtonAction::make()
            // Action::make('export_pdf')
            // ->label('Export PDF')
            // ->url(route('your-model.export-pdf'))
            // ->openUrlInNewTab(),
        ];
    }

}
