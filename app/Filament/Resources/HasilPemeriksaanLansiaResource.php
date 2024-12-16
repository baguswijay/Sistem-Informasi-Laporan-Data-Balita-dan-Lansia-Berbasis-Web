<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HasilPemeriksaanLansiaResource\Pages;
use App\Filament\Resources\HasilPemeriksaanLansiaResource\RelationManagers;
use App\Models\HasilPemeriksaan;
use App\Models\HasilPemeriksaanLansia;
use App\Models\Pasien;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilPemeriksaanLansiaResource extends Resource
{
    protected static ?string $model = HasilPemeriksaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Pemeriksaan Lansia';
    protected static ?string $modelLabel = 'Pemeriksaan Lansia';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Pemeriksaan Lansia')
                    ->schema([
                        Select::make('pasien_id')
                            ->required()
                            ->label('Nama Lansia')
                            ->options(Pasien::where('kategori', 'Lansia')->pluck('nama', 'id'))
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($pasien = Pasien::find($state)) {
                                    $set('umur', $pasien->umur);
                                    $set('jenis_kelamin', $pasien->jenis_kelamin);
                                }
                            }),
                        TextInput::make('umur')
                            ->required()
                            ->label('Umur')
                            ->suffix(' Bulan')
                            ->readOnly(),
                        TextInput::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->readOnly(),
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
                            ->columnSpanFull()
                            ->suffix('mmHg'),
                        Textarea::make('keterangan')
                            // ->required()
                            ->rows(3)
                            ->columnSpanFull()
                            ->label('Keterangan'),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pasien.nama')
                    ->label('Nama Lansia')
                    ->sortable(),
                TextColumn::make('pasien.birth_date')
                    ->label('Tanggal Lahir')
                    ->formatStateUsing(fn(string $state): string => Carbon::parse($state)->locale('id')->isoFormat('D MMMM YYYY'))
                    ->sortable(),
                TextColumn::make('pasien.jenis_kelamin')
                    ->label('Jenis Kelamin'),
                TextColumn::make('pasien.umur')
                    ->label('Umur (Tahun)')
                    ->suffix(' Tahun'),
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotificationTitle('Data Pemeriksaan Lansia Terhapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHasilPemeriksaanLansias::route('/'),
            'create' => Pages\CreateHasilPemeriksaanLansia::route('/create'),
            'edit' => Pages\EditHasilPemeriksaanLansia::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('pasien', function ($query) {
            $query->where('kategori', 'Lansia');
        });
    }
}
