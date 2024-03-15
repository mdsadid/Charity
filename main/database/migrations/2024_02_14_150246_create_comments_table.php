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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('campaign_id')->constrained();
            $table->string('name', 40)->nullable();
            $table->string('email', 40)->nullable();
            $table->text('comment');
            $table->unsignedTinyInteger('status')
                ->default(2)
                ->comment('0 -> comment rejected by admin, 1 -> comment approved by admin, 2 -> comment is pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
