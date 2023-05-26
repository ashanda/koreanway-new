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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('lesson_id');
            $table->string('title');
            $table->string('classtype');
            $table->string('paytype');
            $table->string('doc')->nullable();
            $table->string('link')->nullable();
            $table->string('available_days')->nullable();
            $table->unsignedBigInteger('no_of_views')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
