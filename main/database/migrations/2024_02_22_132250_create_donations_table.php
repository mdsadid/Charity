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
            $table->foreignId('campaign_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('full_name', 255)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('phone', 40)->nullable();
            $table->string('country', 40)->nullable();
            $table->unsignedDecimal('amount', 28, 8);
            $table->unsignedDecimal('charge', 28, 8)->default(0);
            $table->foreignId('gateway_id')->constrained();
            $table->string('gateway_currency', 40);
            $table->unsignedDecimal('conversion_rate', 28, 8)->default(0);
            $table->string('trx', 40);
            $table->unsignedTinyInteger('status')->comment('1 -> payment success, 2 -> payment pending, 3 -> payment cancel');
            $table->string('admin_feedback', 255)->nullable();
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
