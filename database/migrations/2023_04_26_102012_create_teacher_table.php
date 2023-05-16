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
        Schema::create('lmstealmsr', function (Blueprint $table) {
            $table->bigIncrements('tid');
            $table->string('systemid')->nullable();
            $table->string('fullname')->nullable();
            $table->text('address')->nullable();
            $table->string('contactnumber')->nullable();
            $table->text('subdetails')->nullable();
            $table->text('qualification')->nullable();
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->decimal('percentage', 5, 2)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lmstealmsr');
    }
};
