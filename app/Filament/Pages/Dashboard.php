<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use Filament\Widgets\AccountWidget;

// Import widget lain yang ingin Anda tampilkan

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
            StatsOverview::class,
            // Tambahkan widget lain yang ingin Anda tampilkan di sini
            // Contoh: UserOverview::class,
            // JANGAN masukkan BalitaGrowthChart::class di sini
        ];
    }

    public function getWidgets(): array
    {
        return [
            // AccountWidget::class,

            // Widget yang ingin ditampilkan di bawah header
            // Contoh: RecentOrders::class,
        ];
    }
}
