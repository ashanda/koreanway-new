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
            $table->string('option_contactnumber');
            $table->string('profile_pic');
            $table->string('address');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
     
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
