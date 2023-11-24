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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('pic')->nullable();
            $table->string('title');
            $table->longText('detail');
            $table->integer('like')->nullable()->comment('เก็บจำนวนการกด like');
            $table->integer('uid')->comment('ID ของผู้สร้าง Post');
            $table->string('created_by');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
