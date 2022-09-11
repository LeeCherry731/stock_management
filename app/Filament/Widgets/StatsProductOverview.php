<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsProductOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Products', Product::all()->count()),
            Card::make('Products lower then limit', Product::query()->whereColumn([['limit', '>', 'quantity']])->count()),
            Card::make('Average time on page', '3:12'),
        ];
    }
}
