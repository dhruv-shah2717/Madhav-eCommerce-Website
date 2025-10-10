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
        Schema::create('Product_products', function (Blueprint $table) {
            $table->id('Product_id');
            $table->text('Product_image1');
            $table->text('Product_image2');
            $table->text('Product_image3');
            $table->text('Product_image4');
            $table->text('Product_brand');
            $table->text('Product_name');
            $table->text('Product_review');
            $table->integer('Product_price');
            $table->integer('Product_exprice');
            $table->text('Product_about');
            $table->text('Product_color');
            $table->text('Product_category');
            $table->String('Product_new')->default('No');
            $table->String('Product_trending')->default('No');
            $table->text('Product_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product_products');
    }
};
