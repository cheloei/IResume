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
        Schema::create('person_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('skill')->nullable();
            $table->integer('birth')->nullable();
            $table->tinyInteger('military')->nullable();
            $table->text('info')->nullable();
            $table->text('confrontation')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->string('profile')->nullable();
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
        Schema::dropIfExists('person_infos');
    }
};
