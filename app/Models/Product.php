<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot('quantity', 'subtotal');
    }

    protected $fillable = [
        'name',
        'line',
        'description',
        'price',
        'weight',
        'stock',
        'guarantee',
        'brand',
        'size',
        'color',
        'image',
        'gender',
    ];

    // Relación con el modelo SaleProduct
    public function saleProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    // Relación con el modelo Invoice a través de InvoiceProduct
    public function sales()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_product')
                    ->withPivot('quantity', 'subtotal')
                    ->withTimestamps();
    }
}
