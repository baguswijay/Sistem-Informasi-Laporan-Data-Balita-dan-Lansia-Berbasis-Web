<?php

namespace App\Filament\Resources\LansiaResource\Pages;

use App\Filament\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLansia extends ViewRecord
{
    protected static string $resource = LansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit Lansia'),
        ];
    }

    public function getTitle(): string 
    {
        return 'Detail Lansia';
    }
}
