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
        Schema::create('event_flat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('organisation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('banner')->nullable();
            $table->string('max_participants')->nullable();
            $table->json('organisation')->nullable();
            $table->json('dates')->nullable();
            $table->json('pricings')->nullable();
            $table->json('address')->nullable();
            $table->json('tags')->nullable();
            $table->json('category')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_flat');
    }
};
