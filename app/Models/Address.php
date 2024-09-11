<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados de manera masiva
    protected $fillable = [
        'department',
        'city',
        'neighborhood',
        'address_line1',
        'address_line2',
        'user_id', // Asegúrate de incluir 'user_id' aquí
    ];

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
