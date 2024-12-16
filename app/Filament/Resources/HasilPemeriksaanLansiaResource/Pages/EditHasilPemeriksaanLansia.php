<?php

namespace App\Filament\Resources\HasilPemeriksaanLansiaResource\Pages;

use App\Filament\Resources\HasilPemeriksaanLansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilPemeriksaanLansia extends EditRecord
{
    protected static string $resource = HasilPemeriksaanLansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): string|null
    {
        return ('Data Pemeriksaan Lansia Berhasil Diubah');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $hasilPemeriksaan = $this->record;
        if ($hasilPemeriksaan->pasien) {
            // $data['umur'] = $hasilPemeriksaan->pasien->umur;
            $data['jenis_kelamin'] = $hasilPemeriksaan->pasien->jenis_kelamin;
        }
        return $data;
    }
}
