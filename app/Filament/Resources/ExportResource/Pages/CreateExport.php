<?php

namespace App\Filament\Resources\ExportResource\Pages;

use App\Filament\Resources\ExportResource;
use App\Models\Product;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExport extends CreateRecord
{
    public $amount;
    public $productField;

    public $product;
    protected static string $resource = ExportResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->amount = (int)$data['amount'];
        $this->productField = (int)$data['product_id'];

        $this->product = Product::find($this->productField);

        if($this->product->quantity < $this->amount)
        {
            $data['amount'] = $this->product->quantity;
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        // dd($this->productField);
        // dd($this->product);
        if($this->product) {
                if($this->product->quantity > $this->amount)
                {
                    $this->product->quantity = $this->product->quantity - $this->amount;
                    $this->product->save();
                } else {
                    $this->product->quantity = 0;
                    $this->product->save();
                }

        }

        $this->amount = null;
        $this->productField = null;
        $this->product = null;

    }
}
