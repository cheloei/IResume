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
        Schema::create('grammers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('lang');
            $table->tinyInteger('level');
            $table->foreignId('resume');
            $table->foreign('resume')->references('id')->on('resumes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grammers');
    }
};
