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
        Schema::create('Home_slideimages', function (Blueprint $table) {
            $table->id('Slideimage_id');
            $table->text('Slideimage_image');
            $table->text('Slideimage_heading');
            $table->text('Slideimage_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Home_slideimages');
    }
};
