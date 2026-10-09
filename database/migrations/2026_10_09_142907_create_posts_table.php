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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('نصائح عامة');
            $table->string('category_icon')->nullable()->default('fa-solid fa-lightbulb');
            $table->string('image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content');
            $table->string('reading_time')->nullable()->default('5 دقائق قراءة');
            $table->unsignedInteger('views')->default(0);
            $table->boolean('status')->default(true);
            $table->integer('order')->default(0);
            $table->date('published_at')->nullable();
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
