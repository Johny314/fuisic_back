<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_set_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_set_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('completion_time')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_set_histories');
    }
};
