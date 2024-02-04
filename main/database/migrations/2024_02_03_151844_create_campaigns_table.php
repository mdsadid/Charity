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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('campaign_category_id')->constrained();
            $table->string('image', 255);
            $table->json('gallery');
            $table->string('name', 255);
            $table->longText('description');
            $table->string('document', 255)->nullable();
            $table->unsignedDecimal('goal_amount', 28, 8);
            $table->unsignedDecimal('raised_amount', 28, 8);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->unsignedTinyInteger('status')
                ->default(2)
                ->comment('0 -> campaign rejected, 1 -> campaign approved, 2 -> campaign pending');
            $table->unsignedTinyInteger('update_status')
                ->nullable()
                ->comment('0 -> campaign update rejected, 1 -> campaign update approved, 2 -> campaign update pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
