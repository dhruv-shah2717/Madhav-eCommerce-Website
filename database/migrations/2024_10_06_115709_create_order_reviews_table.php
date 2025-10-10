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
        Schema::create('Order_reviews', function (Blueprint $table) {
            $table->id('Review_id');
            $table->integer('Review_rid');
            $table->text('Review_name');
            $table->text('Review_email');
            $table->text('Review_pphoto');
            $table->text('Review_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Order_reviews');
    }
};
