<?php

namespace App\Filament\Resources\ExportResource\Pages;

use App\Filament\Resources\ExportResource;
use App\Models\Product;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExport extends CreateRecord
{
    protected static string $resource = ExportResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $amount = (int)$data['amount'];
        $productField = (int)$data['product_id'];

        $product = Product::find($productField)->first();

        if($product) {
            if($product->quantity >= $amount) {
                $product->quantity = $product->quantity - $amount;
                $product->save();
            } else {
                $data['amount'] = $product->quantity;
                $product->quantity = 0;
                $product->save();
            }
        }



        return $data;
    }
}