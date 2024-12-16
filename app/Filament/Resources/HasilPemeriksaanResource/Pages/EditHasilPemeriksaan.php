<?php

namespace App\Filament\Resources\HasilPemeriksaanResource\Pages;

use App\Filament\Resources\HasilPemeriksaanResource;
use App\Traits\StatusAntropometriTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilPemeriksaan extends EditRecord
{
    use StatusAntropometriTrait;
    protected static string $resource = HasilPemeriksaanResource::class;

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
        return ('Data Pemeriksaan Balita Berhasil Diubah');
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->hitungStatusAntropometri($data);
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
