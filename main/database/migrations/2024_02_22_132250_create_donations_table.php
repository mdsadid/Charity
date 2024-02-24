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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deposit_id')->constrained();
            $table->foreignId('campaign_id')->constrained();
            $table->string('type', 40);
            $table->string('full_name', 255)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('country', 40)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
