<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use App\Filament\Widgets\BalitaGrowthChart;
use Filament\Actions;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
// use Filament\Resources\Table;
// use Filament\Resources\Form;

class ViewBalita extends ViewRecord
{
    protected static string $resource = BalitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit Balita'),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            BalitaGrowthChart::make([
                'recordId' => $this->record->id
            ]),
        ];
    }
    public function getTitle(): string
    {
        return 'Detail Balita';
    }
}
