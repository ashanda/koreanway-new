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
        Schema::create('lmsusers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_pass');
            $table->string('admintype');
            $table->string('admin');
            $table->string('students');
            $table->string('teachers');
            $table->string('class');
            $table->string('subject');
            $table->string('lesson');
            $table->string('payments');
            $table->string('class_schedule');
            $table->string('mail');
            $table->string('joining_date');
            $table->string('status');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lmsusers');
    }
};
