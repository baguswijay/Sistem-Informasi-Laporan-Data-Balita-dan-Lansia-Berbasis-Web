<?php

namespace App\Filament\Resources\HasilPemeriksaanLansiaResource\Pages;

use App\Filament\Resources\HasilPemeriksaanLansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHasilPemeriksaanLansia extends CreateRecord
{
    protected static string $resource = HasilPemeriksaanLansiaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): string|null
    {
        return 'Data Hasil Pemeriksaan Berhasil Ditambahkan';
    }

    public function getTitle(): string
    {
        return 'Tambah Pemeriksaan Lansia';
    }
    protected function getCreateButtonLabel(): string
    {
        return 'Tambah Pemeriksaan Lansia';
    }
}
