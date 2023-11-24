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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->integer('level')->nullable()->comment('null=normal, 0=staff, 1=admin');
            $table->date('start')->nullable()->comment('วันที่สมัคร');
            $table->date('end')->nullable()->comment('วันหมดอายุ');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
