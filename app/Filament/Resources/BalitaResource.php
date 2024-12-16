<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BalitaResource\Pages;
use App\Filament\Resources\BalitaResource\RelationManagers;
use App\Filament\Resources\BalitaResource\RelationManagers\HasilPemeriksaanRelationManager;
use App\Models\Balita;
use App\Models\Pasien;
use Carbon\Carbon;
use Closure;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Concerns\CanBeReadOnly;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\SelectAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BalitaResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationLabel(): string
    {
        return 'Balita';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Balita';
    }
    public static function getCreateButtonLabel(): string
    {
        return 'Tambah Balita';
    }
    protected static ?int $navigationSort = 3;
    protected static ?string $modelLabel = 'Balita';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            // ->unique()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('ayah')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('ibu')
                            ->required()
                            ->maxLength(255),
                        Select::make('jenis_kelamin')
                            ->required()
                            ->options([
                                'laki-laki' => 'Laki-laki',
                                'perempuan' => 'Perempuan',
                            ]),
                        DatePicker::make('birth_date')
                            ->label('Tanggal Lahir')
                            ->required()
                            ->native(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $umur = Carbon::parse($state)->diffInMonths(Carbon::now());
                                    $set('umur', round($umur));
                                }
                            }),
                        TextInput::make('umur')
                            ->numeric()
                            ->readOnly(),
                            Forms\Components\TextInput::make('anak_ke')
                            ->numeric()
                            ->label('Anak ke-'),
                        Forms\Components\TextInput::make('nik')
                            ->label('NIK')
                            ->maxLength(16),
                        Forms\Components\TextInput::make('bbl')
                            ->label('Berat Badan Lahir (kg)')
                            ->numeric()
                            ->step(0.01),
                        Forms\Components\TextInput::make('no_kk')
                            ->label('Nomor KK')
                            ->maxLength(16),
                        Forms\Components\Toggle::make('imd')
                            ->label('Inisiasi Menyusu Dini')
                            ->onColor('success')
                            ->offColor('danger'),
                        Forms\Components\TextInput::make('no_hp')
                            ->label('Nomor HP')
                            ->tel()
                            ->maxLength(15),
                        Forms\Components\TextInput::make('no_rumah')
                            ->label('Nomor Rumah')
                            ->maxLength(10),
                        Forms\Components\TextInput::make('rt')
                            ->label('RT')
                            ->maxLength(3),
                        Forms\Components\TextInput::make('rw')
                            ->label('RW')
                            ->maxLength(3),
                        Forms\Components\TextInput::make('pbl')
                            ->label('Panjang Badan Lahir (cm)')
                            ->numeric()
                            ->step(0.01),
                        Forms\Components\TimePicker::make('jam_lahir')
                            ->label('Jam Lahir')
                            ->seconds(false)
                            ->native(false),
                        Select::make('kategori')
                            ->required()
                            ->options([
                                'Balita' => 'Balita',
                                'Bansia' => 'Lansia',
                            ]),
                    ])->columns(3)
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('ayah')->searchable(),
                TextColumn::make('ibu')->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->searchable()
                    ->label('Jenis Kelamin'),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => Carbon::parse($state)->locale('id')->isoFormat('D MMMM YYYY')),
                TextColumn::make('umur')
                    ->label('Umur (Bulan)')
                    ->suffix(' Bulan'),

            ])
            ->filters([
                Filter::make('bulan_tahun')
                    ->form([
                        DatePicker::make('bulan_tahun')
                            ->label('Pilih Bulan dan Tahun')
                            ->displayFormat('F Y')
                            ->format('Y-m')
                            ->firstDayOfWeek(1)
                            ->closeOnDateSelection()
                            ->native(false)
                    ])
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                    ->successNotificationTitle('Data Balita Terhapus'),
            ])
            ->bulkActions([
                BulkAction::make('export')
                    ->label('Ekspor Data Balita')
                    ->action(function (Collection $records, array $data) {
                        return self::exportBalitaData($records, $data['bulan_tahun'] ?? now()->format('Y-m'));
                    })
                    ->form([
                        DatePicker::make('bulan_tahun')
                            ->label('Pilih Bulan dan Tahun')
                            ->displayFormat('F Y')
                            ->format('Y-m')
                            ->default(now()->format('Y-m'))
                            ->native(false)
                            ->required()
                    ])
                    ->deselectRecordsAfterCompletion()
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
            ]);
    }


    public static function getRelations(): array
    {
        return [
            HasilPemeriksaanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBalitas::route('/'),
            'create' => Pages\CreateBalita::route('/create'),
            'view' => Pages\ViewBalita::route('/{record}'),
            'edit' => Pages\EditBalita::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'Balita');
    }

    public static function exportBalitaData(Collection $balitas, string $bulanTahun)
    {
        $carbon = \Carbon\Carbon::createFromFormat('Y-m', $bulanTahun);
        $month = $carbon->format('m');
        $year = $carbon->format('Y');

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exports.balita-data', [
            'balitas' => $balitas,
            'month' => $carbon->format('F'),
            'year' => $year,
            'hasilPemeriksaan' => \App\Models\HasilPemeriksaan::whereIn('pasien_id', $balitas->pluck('id'))
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get()
                ->groupBy('pasien_id')
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, "data-balita-{$bulanTahun}.pdf");
    }
}
