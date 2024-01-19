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
        Schema::create('softskills', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_uuid');
            $table->longText('icon');
            $table->string('softskill');
            $table->string('short_desc');
            $table->timestamps();

            $table->foreign('user_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('softskills');
    }
};
