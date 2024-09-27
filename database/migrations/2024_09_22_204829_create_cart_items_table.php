<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios
        $table->unsignedBigInteger('product_id'); // Relación con la tabla de productos
        $table->integer('quantity')->default(1); // Cantidad del producto
        $table->string('image', 255); // Imagen del producto
        $table->string('name'); // Nombre del producto
        $table->decimal('price', 10, 2); // Precio del producto
        $table->timestamps();

        // Relación con la tabla de usuarios y productos
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        // Añadir índices a las claves foráneas para mejorar la performance
        $table->index('user_id');
        $table->index('product_id');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
