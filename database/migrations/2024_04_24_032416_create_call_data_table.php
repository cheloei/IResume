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
        Schema::create('call_data', function (Blueprint $table) {
            $table->id();
            $table->string('site')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('rubika')->nullable();
            $table->string('bale')->nullable();
            $table->string('eitaa')->nullable();
            $table->string('aparat')->nullable();
            $table->string('gap')->nullable();
            $table->string('telegram')->nullable();
            $table->string('inestagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
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
        Schema::dropIfExists('call_data');
    }
};
