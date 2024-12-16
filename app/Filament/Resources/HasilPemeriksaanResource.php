<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HasilPemeriksaanResource\Pages;
use App\Filament\Resources\HasilPemeriksaanResource\RelationManagers;
use App\Models\BeratBadanUmur;
use App\Models\HasilPemeriksaan;
use App\Models\Pasien;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilPemeriksaanResource extends Resource
{
    protected static ?string $model = HasilPemeriksaan::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Pemeriksaan Balita';
    protected static ?string $modelLabel = 'Pemeriksaan Balita';
    protected static ?int $navigationSort = 5;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('pasien_id')
                            ->required()
                            ->label('Nama Balita')
                            ->options(Pasien::where('kategori', 'balita')->pluck('nama', 'id'))
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pasien.nama')
                    ->label('Nama Balita')
                    ->sortable(),
                TextColumn::make('pasien.birth_date')
                    ->label('Tanggal Lahir')
                    ->formatStateUsing(fn(string $state): string => Carbon::parse($state)->locale('id')->isoFormat('D MMMM YYYY'))
                    ->sortable(),
                TextColumn::make('pasien.jenis_kelamin')
                    ->label('Jenis Kelamin'),
                TextColumn::make('pasien.umur')
                    ->label('Umur (Bulan)')
                    ->suffix(' Bulan'),
                TextColumn::make('tb')
                    ->label('Tinggi Badan')
                    ->suffix(' cm'),
                TextColumn::make('bb')
                    ->label('Berat Badan')
                    ->suffix(' kg'),
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
                    ->successNotificationTitle('Data Pemeriksaan Balita Terhapus'),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListHasilPemeriksaans::route('/'),
            'create' => Pages\CreateHasilPemeriksaan::route('/create'),
            'edit' => Pages\EditHasilPemeriksaan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('pasien', function ($query) {
            $query->where('kategori', 'Balita');
        });
    }
}
