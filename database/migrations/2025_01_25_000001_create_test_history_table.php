<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('answer');
            $table->integer('completion_time')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_histories');
    }
};
