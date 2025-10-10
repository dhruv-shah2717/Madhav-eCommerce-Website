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
        Schema::create('Order_orders', function (Blueprint $table) {
            $table->id('Order_id');
            $table->integer('Order_pid');
            $table->text('Order_image');
            $table->text('Order_name');
            $table->integer('Order_price');
            $table->integer('Order_qty');
            $table->date('Order_date');
            $table->text('Order_paymentid');
            $table->string('Order_status')->default('Unpaid');
            $table->text('Order_uid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Order_orders');
    }
};
