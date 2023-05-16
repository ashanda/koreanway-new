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
        Schema::create('lmsregister', function (Blueprint $table) {
            $table->id();
            $table->string('reid')->nullable();
            $table->string('stnumber')->nullable();
            $table->string('email')->unique();
            $table->string('fullname')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('school')->nullable();
            $table->string('district')->nullable();
            $table->string('town')->nullable();
            $table->string('pcontactnumber')->nullable();
            $table->string('contactnumber')->nullable();
            $table->text('address')->nullable();
            $table->string('level')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(0);
            $table->string('ip_address')->nullable();
            $table->tinyInteger('relogin')->default(0);
            $table->string('reloging_ip')->nullable();
            $table->decimal('payment', 10, 2)->default(0);
            $table->string('verifycode')->nullable();
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
