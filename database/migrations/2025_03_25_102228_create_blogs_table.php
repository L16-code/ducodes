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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('thumbnail_img')->nullable(); 
            $table->string('blog_type'); 
            $table->string('blog_title');
            $table->string('blog_slug')->unique(); 
            $table->dateTime('posted_on'); 
            $table->text('short_desc')->nullable(); 
            $table->longText('main_desc'); 
            $table->string('main_img')->nullable(); 
            $table->json('tags')->nullable();
            $table->string('status')->default('inactive'); 
            $table->json('seo_meta')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
