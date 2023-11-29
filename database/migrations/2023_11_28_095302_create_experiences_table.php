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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_uuid');
            $table->string('position');
            $table->string('office');
            $table->date('start');
            $table->date('end')->nullable();
            $table->longText('desc');
            $table->tinyInteger('type')->comment('1-> untuk kerja, 2-> untuk magang');
            $table->timestamps();
            
            $table->foreign('user_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
