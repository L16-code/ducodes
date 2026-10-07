<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('title');
            $table->text('meta_description');
            $table->string('tagline');
            $table->text('quick_answer');
            $table->json('intro');
            $table->json('why_ducodes');
            $table->json('process');
            $table->json('tech_stack');
            $table->json('related')->nullable();
            $table->string('hire_developer_slug')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
