<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id', 
        'product_id', 
        'quantity', 
        'subtotal'
    ];

    // Relación con el modelo sale
    public function sale()
    {
        return $this->belongsTo(sale::class);
    }

    // Relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
