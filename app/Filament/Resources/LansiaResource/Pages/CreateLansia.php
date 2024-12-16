<?php

namespace App\Filament\Resources\LansiaResource\Pages;

use App\Filament\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLansia extends CreateRecord
{
    protected static string $resource = LansiaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): string|null
    {
        return 'Data Lansia Berhasil Ditambahkan';
    }
}
