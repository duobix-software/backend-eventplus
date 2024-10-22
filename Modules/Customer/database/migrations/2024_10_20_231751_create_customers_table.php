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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->unique()->index();
            $table->string('email')->unique()->index();
            $table->string('username')->nullable()->unique()->index();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_suspended')->default(false);
            $table->boolean('is_organizer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
