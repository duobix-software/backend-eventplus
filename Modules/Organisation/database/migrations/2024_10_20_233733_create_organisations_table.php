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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            
            $table->string('country');
            $table->string('state');
            $table->string('postcode');
            $table->string('city');
            $table->string('address');

            $table->boolean('status')->default(true);
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_suspended')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};
