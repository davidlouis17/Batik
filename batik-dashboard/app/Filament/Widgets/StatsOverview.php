<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Event;
use App\Models\ProductCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah produk batik')
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('success'),
            Stat::make('Total Kategori', ProductCategory::count())
                ->description('Jumlah kategori produk')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
            Stat::make('Total Event', Event::count())
                ->description('Jumlah event & workshop')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),
        ];
    }
}