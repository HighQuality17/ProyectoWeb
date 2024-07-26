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
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('product_id');
            $table->string('quantity');
            $table->string('subtotal');
            $table->timestamps();

            $table->foreign('invoice_id')->nullable()->constrained('invoices')->cascadeOnUpdate()->nullonDelete();
            $table->foreign('product_id')->nullable()->constrained('products')->cascadeOnUpdate()->nullonDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
