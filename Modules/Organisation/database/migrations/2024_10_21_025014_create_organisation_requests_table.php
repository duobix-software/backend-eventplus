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
        Schema::create('organisation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('organisation_logo')->nullable();
            $table->string('organisation_name');
            $table->text('organisation_description');
            $table->string('organisation_website');
            $table->string('status');
            $table->foreignId('organisation_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_requests');
    }
};
