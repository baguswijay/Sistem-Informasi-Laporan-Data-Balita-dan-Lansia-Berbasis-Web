<?php

namespace App\Filament\Widgets;

use App\Models\Balita;
use App\Models\Lansia;
use App\Models\Pasien;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Kader', User::all()->count())
            ->extraAttributes(['class' => 'flex items-center space-x-2'])
            ->icon('heroicon-o-user-group')
            ->color('success'),
            Stat::make('Jumlah Balita', Pasien::where('kategori', 'Balita')->count())
            ->icon('heroicon-o-user-group'),
            Stat::make('Jumlah Lansia', Pasien::where('kategori','Lansia')->count())
            ->icon('heroicon-o-user-group'),
            Stat::make('Jumlah Balita Umur 0-8 Bulan', Pasien::where('kategori','Balita')->where('umur','<=',8)->count())
            ->icon('heroicon-o-cake'),
            Stat::make('Jumlah Balita Umur 9-12 Bulan', Pasien::where('kategori','Balita')->whereBetween('umur',[9,12])->count())
            ->icon('heroicon-o-calendar'),
            Stat::make('Jumlah Balita Umur 13-24 Bulan', Pasien::where('kategori','Balita')->whereBetween('umur',[13,24])->count())
            ->icon('heroicon-o-chart-bar'),
            Stat::make('Jumlah Balita Umur 24-59 Bulan', Pasien::where('kategori','Balita')->whereBetween('umur',[24,59])->count())
            ->icon('heroicon-o-chart-pie'),
        ];
    }
}
