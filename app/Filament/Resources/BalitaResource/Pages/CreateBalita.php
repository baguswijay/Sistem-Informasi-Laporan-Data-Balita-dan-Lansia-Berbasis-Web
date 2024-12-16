<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateBalita extends CreateRecord
{
    protected static string $resource = BalitaResource::class;
    protected function getCreateAnotherButtonLabel(): string
    {
        return 'Tambah Balita Lain';
    }
    protected function getCreateButtonLabel(): string
    {
        return 'Tambah Balita';
    }
    public function getTitle(): string
    {
        return 'Tambah Balita';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): string|null
    {
        return 'Data Balita Berhasil Ditambahkan';
    }
    
}