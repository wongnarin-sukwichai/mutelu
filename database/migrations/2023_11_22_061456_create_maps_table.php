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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('pic')->nullable();
            $table->integer('type');
            $table->string('title');        
            $table->string('lat');
            $table->string('lon');
            $table->longText('detail');
            $table->longText('gmap')->nullable()->comment('link to google map');
            $table->integer('uid')->comment('ID ของผู้สร้าง Post');;
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
        Schema::dropIfExists('maps');
    }
};
