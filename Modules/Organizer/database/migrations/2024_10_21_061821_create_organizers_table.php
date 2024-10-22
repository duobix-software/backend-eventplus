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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('username')->nullable()->unique()->index();
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status')->default(true);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_suspended')->default(false);
            $table->boolean('is_customer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
