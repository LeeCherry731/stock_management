<?php

namespace App\Filament\Resources\ImportResource\Pages;

use App\Filament\Resources\ImportResource;
use App\Models\Product;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImport extends CreateRecord
{
    protected static string $resource = ImportResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $amount = (int)$data['amount'];
        $productField = (int)$data['product_id'];

        $product = Product::find($productField)->first();

        if($product) {
            $product->quantity = $product->quantity + $amount;
            $product->save();
        }

        return $data;
    }
}
