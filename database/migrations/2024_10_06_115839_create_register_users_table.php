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
        Schema::create('Register_users', function (Blueprint $table) {
            $table->id('User_id');
            $table->text('User_fname');
            $table->text('User_lname');
            $table->string('User_email')->unique();
            $table->text('User_phone');
            $table->text('User_password');
            $table->date('User_date');
            $table->string('User_pphoto')->default('Default.png');
            $table->string('User_role')->default('User');
            $table->string('User_status')->default('Inactive');
            $table->text('User_token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Register_users');
    }
};
