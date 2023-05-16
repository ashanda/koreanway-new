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
            $table->string('title');
            $table->string('classtype');
            $table->string('paytype');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('course_id');
            $table->text('lesson')->nullable();
            $table->string('image')->nullable();
            $table->string('doc')->nullable();
            $table->string('link')->nullable();
            $table->string('available_days')->nullable();
            $table->unsignedBigInteger('no_of_views')->nullable();
            $table->string('level')->nullable();
            $table->string('password')->nullable();
            $table->string('status');
            $table->rememberToken();
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
