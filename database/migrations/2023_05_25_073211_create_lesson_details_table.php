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
        Schema::create('lesson_details', function (Blueprint $table) {
            $table->id();
            $table->string('lesson_id');
            $table->string('lecture_title');
            $table->string('thumbnail');
            $table->string('background_image');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('course_id');
            $table->string('video_link')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_description')->nullable();
            $table->string('live_link')->nullable();
            $table->string('live_title')->nullable();
            $table->string('live_description')->nullable();
            $table->bigInteger('mcq_id')->nullable();
            $table->bigInteger('paper_id')->nullable();
            $table->string('tute')->nullable();
            $table->string('audio')->nullable();
            $table->string('extra_video')->nullable();
            $table->string('extra_youtube')->nullable();
            $table->date('published_date'); 
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_details');
    }
};
