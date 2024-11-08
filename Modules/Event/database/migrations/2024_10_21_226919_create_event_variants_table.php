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
        Schema::create('event_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('event_date_id')->nullable()->constrained('event_dates')->cascadeOnDelete();
            $table->foreignId('event_pricing_id')->nullable()->constrained('event_pricings')->cascadeOnDelete();
            $table->string('name')->index()->unique();
            $table->string('total_qte');
            $table->string('remaining_qte');

            $table->unique(['name', 'event_id', 'event_pricing_id', 'event_date_id'], 'variant_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_settings');
    }
};
