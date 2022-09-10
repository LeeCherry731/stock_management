<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSupplier;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,  'product_supplier', 'supplier_id', 'product_id')->using(ProductSupplier::class)->withTimestamps();
    }

    public function imports()
    {
        return $this->hasMany(Import::class);
    }

    public function exports()
    {
        return $this->hasMany(Export::class);
    }

}
