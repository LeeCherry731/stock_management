<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LowLimitProducts extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        dd(Product::query()->where('limit', '>', 11));
        return Product::query()->where('limit', '>', 'quantity');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('category.name'),
            TextColumn::make('category.slug')->label('slug'),
            TextColumn::make('price'),
            TextColumn::make('limit'),
            TextColumn::make('quantity'),
            TextColumn::make('created_at')->dateTime()
        ];
    }
}
