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
        Schema::table('customers', function (Blueprint $table) {
            $table->after('remember_token', function () use ($table) {
                $table->timestamp('email_verified_at')->nullable();
                $table->timestamp('phone_verified_at')->nullable(); 
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('phone_verified_at'); 
        });
    }
};
