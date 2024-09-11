<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'sale_date', 
        'total_amount',
        'dispatch_date'
    ];

    // Relación con el modelo SaleProduct
    public function SaleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }

    // Relación con el modelo Product a través de SaleProduct
    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_product')
                    ->withPivot('quantity', 'subtotal')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
