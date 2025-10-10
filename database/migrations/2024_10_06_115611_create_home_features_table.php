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
        Schema::create('Home_features', function (Blueprint $table) {
            $table->id('Feature_id');
            $table->text('Feature_icon');
            $table->text('Feature_name');
            $table->text('Feature_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Home_features');
    }
};
