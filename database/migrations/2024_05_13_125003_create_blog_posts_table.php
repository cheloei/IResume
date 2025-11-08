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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category');
            $table->foreign('category')->references('id')->on('blog_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('image');
            $table->text('body');
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
        Schema::dropIfExists('blog_posts');
    }
};
