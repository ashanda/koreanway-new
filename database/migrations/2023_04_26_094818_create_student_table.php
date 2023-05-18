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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('stnumber')->unique();
            $table->string('email')->unique();
            $table->string('fullname');
            $table->date('dob');
            $table->string('gender');
            $table->string('district');
            $table->string('town');
            $table->string('contactnumber');
            $table->string('address');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lmsregister');
    }
};
