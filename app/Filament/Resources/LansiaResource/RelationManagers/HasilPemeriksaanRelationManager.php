<?php

namespace App\Filament\Resources\LansiaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Section;
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
    protected static string $relationship = 'hasilPemeriksaan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pemeriksaan Lansia')
                    ->schema([
                        TextInput::make('bb')
                            ->required()
                            ->label('Berat Badan')
                            ->suffix('kg')
                            ->numeric(),
                        TextInput::make('tb')
                            ->required()
                            ->label('Tinggi Badan')
                            ->suffix('cm')
                            ->numeric(),
                        TextInput::make('lingkar_perut')
                            ->required()
                            ->label('Lingkar Perut')
                            ->suffix('cm')
                            ->numeric(),
                        TextInput::make('tensi')
                            ->required()
                            ->label('Tensi')
                            ->suffix('mmHg'),
                        TextInput::make('keterangan')
                            // ->required()
                            ->label('Keterangan'),
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
                    ->suffix('kg'),
                Tables\Columns\TextColumn::make('tb')
                    ->label('Tinggi Badan')
                    ->suffix('cm'),
                Tables\Columns\TextColumn::make('lingkar_perut')
                    ->label('Lingkar Perut')
                    ->suffix('cm'),
                Tables\Columns\TextColumn::make('tensi')
                    ->label('Tensi')
                    ->suffix('mmHg'),
                TextColumn::make('keterangan')
                    ->label('Keterangan'),
                TextColumn::make('created_at')
                    ->label('Tanggal Pemeriksaan')
                    ->date('d F Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
