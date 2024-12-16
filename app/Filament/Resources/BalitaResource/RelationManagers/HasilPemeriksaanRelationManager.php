<?php

namespace App\Filament\Resources\BalitaResource\RelationManagers;

use App\Models\Pasien;
use Filament\Forms;
use App\Traits\StatusAntropometriTrait;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilPemeriksaanRelationManager extends RelationManager
{
    use StatusAntropometriTrait;
    protected static string $relationship = 'hasilPemeriksaan';
    protected static ?string $recordTitleAttribute = 'id';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pemeriksaan Balita')
                    ->schema([
                        TextInput::make('tb')
                            ->required()
                            ->label('Tinggi Badan')
                            ->suffix(' cm')
                            ->numeric()
                            ->rules(['min:45']),
                        TextInput::make('bb')
                            ->required()
                            ->label('Berat Badan')
                            ->suffix(' kg')
                            ->rules(['min:0'])
                            ->numeric(),
                        TextInput::make('lingkar_lengan')
                            ->label('Lingkar Lengan')
                            ->suffix(' cm')
                            ->numeric(),
                        TextInput::make('lingkar_kepala')
                            ->label('Lingkar Kepala')
                            ->suffix(' cm')
                            ->numeric(),
                        Select::make('kondisi_badan')
                            ->required()
                            ->label('Kondisi Badan')
                            ->options([
                                'Telentang' => 'Telentang',
                                'Berdiri' => 'Berdiri',
                            ]),
                    ])->columns(3)

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('hasil_pemeriksaan')
            ->columns([
                Tables\Columns\TextColumn::make('bb')
                    ->label('Berat Badan')
                    ->suffix(' kg'),
                Tables\Columns\TextColumn::make('tb')
                    ->label('Tinggi Badan'),
                TextColumn::make('bb_umur')
                    ->label('BB/Umur')
                    ->formatStateUsing(function ($state, $record) {
                        $color = $record->bb_umur_color ?? 'gray';
                        return "<span class='px-2 py-1 rounded' style='background-color: {$color}; color: white;'>{$state}</span>";
                    })
                    ->html(),
                TextColumn::make('tb_umur')
                    ->label('TB/Umur')
                    ->formatStateUsing(function ($state, $record) {
                        $color = $record->tb_umur_color ?? 'gray';
                        return "<span class='px-2 py-1 rounded' style='background-color: {$color}; color: white;'>{$state}</span>";
                    })
                    ->html(),
                TextColumn::make('lingkar_lengan')
                    ->label('Lingkar Lengan'),
                TextColumn::make('lingkar_kepala')
                    ->label('Lingkar Kepala'),
                TextColumn::make('status_gizi')
                    ->label('Status Gizi')
                    ->formatStateUsing(function ($state, $record) {
                        $color = $record->status_gizi_color ?? 'gray';
                        return "<span class='px-2 py-1 rounded' style='background-color: {$color}; color: white;'>{$state}</span>";
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pemeriksaan')
                    ->date('d F Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // protected function calculateIndices($value, callable $set)
    // {
    //     $livewire = \Livewire\Livewire::getInstance();
    //     if (!$livewire) return;

    //     $data = $livewire->getPropertyValue('data');
    //     $balita = $this->getOwnerRecord();

    //     if (isset($data['tb']) && isset($data['bb']) && isset($data['kondisi_badan'])) {
    //         $calculationData = [
    //             'umur' => $balita->umur,
    //             'jenis_kelamin' => $balita->jenis_kelamin,
    //             'tb' => $data['tb'],
    //             'bb' => $data['bb'],
    //             'kondisi_badan' => $data['kondisi_badan'],
    //         ];

    //         $result = $this->hitungStatusAntropometri($calculationData);

    //         $set('bb_umur', $result['bb_umur']);
    //         $set('tb_umur', $result['tb_umur']);
    //         $set('status_gizi', $result['status_gizi']);
    //     }
    // }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $balita = $this->getOwnerRecord();
    //     $calculationData = [
    //         'umur' => $balita->umur,
    //         'jenis_kelamin' => $balita->jenis_kelamin,
    //         'tb' => $data['tb'],
    //         'bb' => $data['bb'],
    //         'kondisi_badan' => $data['kondisi_badan'],
    //     ];

    //     $result = $this->hitungStatusAntropometri($calculationData);

    //     return array_merge($data, [
    //         'bb_umur' => $result['bb_umur'],
    //         'bb_umur_color' => $result['bb_umur_color'],
    //         'tb_umur' => $result['tb_umur'],
    //         'tb_umur_color' => $result['tb_umur_color'],
    //         'status_gizi' => $result['status_gizi'],
    //         'status_gizi_color' => $result['status_gizi_color'],
    //     ]);
    // }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     return $this->mutateFormDataBeforeCreate($data);
    // }
}
