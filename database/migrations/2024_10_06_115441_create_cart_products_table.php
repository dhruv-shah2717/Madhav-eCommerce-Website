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
        Schema::create('Cart_products', function (Blueprint $table) {
            $table->id('Product_id');
            $table->integer('Product_pid');
            $table->text('Product_image');
            $table->text('Product_name');
            $table->integer('Product_price');
            $table->integer('Product_qty')->default(1);
            $table->text('Product_uid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cart_products');
    }
};
