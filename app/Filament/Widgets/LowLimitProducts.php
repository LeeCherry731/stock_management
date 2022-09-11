<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LowLimitProducts extends BaseWidget
{
    protected static ?int $sort = 2;
    protected static ?string $title = 'Lower then limit';
    protected static ?string $navigationLabel = 'Lower then limit';
    protected int | string | array $columnSpan = 'full';
    protected function getTableQuery(): Builder
    {
        // dd(Product::query()->whereColumn(['limit', '>', 'quantity'])->limit(10));
        return Product::query()->whereColumn([['limit', '>', 'quantity']])->limit(10);
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
