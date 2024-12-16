<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LansiaResource\Pages;
use App\Filament\Resources\LansiaResource\RelationManagers;
use App\Filament\Resources\LansiaResource\RelationManagers\HasilPemeriksaanRelationManager;
use App\Filament\Resources\LansiaResource\RelationManagers\HasilPemeriksaanRelationManagerRelationManager;
use App\Models\Lansia;
use App\Models\Pasien;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LansiaResource extends Resource
{
    protected static ?string $model = Pasien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationLabel(): string
    {
        return 'Lansia';
    }
    protected static ?string $modelLabel = 'Lansia';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            // ->unique()
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('bpjs')
                            ->label('BPJS')
                            ->required()
                            ->numeric(),
                        DatePicker::make('birth_date')
                            ->label('Tanggal Lahir')
                            ->required()
                            ->native(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $umur = Carbon::parse($state)->diffInYears(Carbon::now());
                                    $set('umur', round($umur));
                                }
                            }),
                        TextInput::make('umur')
                            ->numeric()
                            ->readOnly(),
                        Select::make('jenis_kelamin')
                            ->required()
                            ->options([
                                'laki-laki' => 'Laki-laki',
                                'perempuan' => 'Perempuan',
                            ]),
                        Select::make('kategori')
                            ->required()
                            ->options([
                                'Balita' => 'Balita',
                                'Lansia' => 'Lansia',
                            ]),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->sortable(),
                TextColumn::make('bpjs')
                    ->label('BPJS')
                    ->sortable(),
                TextColumn::make('jenis_kelamin')
                    ->searchable()
                    ->label('Jenis Kelamin'),
                TextColumn::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => Carbon::parse($state)->locale('id')->isoFormat('D MMMM YYYY')),
                TextColumn::make('umur')
                    ->label('Umur (Tahun)')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                    ->successNotificationTitle('Data Lansia Terhapus'),
            ])
            ->bulkActions([
                BulkAction::make('export')
                    ->label('Ekspor Data Lansia')
                    ->action(function (Collection $records, array $data) {
                        return self::exportLansiaData($records, $data['bulan_tahun'] ?? now()->format('Y-m'));
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
            'index' => Pages\ListLansias::route('/'),
            'create' => Pages\CreateLansia::route('/create'),
            'view' => Pages\ViewLansia::route('/{record}'),
            'edit' => Pages\EditLansia::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kategori', 'Lansia');
    }

    public static function exportLansiaData(Collection $lansias, string $bulanTahun)
    {
        $carbon = \Carbon\Carbon::createFromFormat('Y-m', $bulanTahun);
        $month = $carbon->format('m');
        $year = $carbon->format('Y');

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exports.lansia-data', [
            'lansias' => $lansias,
            'month' => $carbon->format('F'),
            'year' => $year,
            'hasilPemeriksaan' => \App\Models\HasilPemeriksaan::whereIn('pasien_id', $lansias->pluck('id'))
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->get()
                ->groupBy('pasien_id')
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, "data-lansia-{$bulanTahun}.pdf");
    }
}
