<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('short_description');

            // Client
            $table->string('client_name')->nullable();
            $table->string('client_logo')->nullable();
            $table->string('industry')->nullable()->index();
            $table->string('service')->nullable()->index();
            $table->string('location')->nullable();
            $table->string('project_duration')->nullable();
            $table->string('project_type')->nullable();

            // Hero
            $table->string('hero_image')->nullable();
            $table->string('hero_image_alt')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_url')->nullable();

            // Content
            $table->longText('challenge')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('implementation')->nullable();
            $table->longText('results')->nullable();
            $table->longText('business_impact')->nullable();

            // Structured repeatable data
            $table->json('tech_stack')->nullable();
            $table->json('key_metrics')->nullable();
            $table->json('gallery')->nullable();

            // Testimonial (single, flat — not a repeatable group)
            $table->text('testimonial_quote')->nullable();
            $table->string('testimonial_person_name')->nullable();
            $table->string('testimonial_designation')->nullable();
            $table->string('testimonial_company')->nullable();
            $table->string('testimonial_person_image')->nullable();

            // Publishing
            $table->boolean('featured')->default(false)->index();
            $table->string('status')->default('draft')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->unsignedInteger('sort_order')->default(0);

            // SEO
            $table->string('seo_title')->nullable();
            $table->string('seo_meta_description')->nullable();
            $table->string('seo_focus_keyword')->nullable();
            $table->string('seo_canonical_url')->nullable();
            $table->string('seo_og_title')->nullable();
            $table->string('seo_og_description')->nullable();
            $table->string('seo_og_image')->nullable();
            $table->string('seo_twitter_title')->nullable();
            $table->string('seo_twitter_description')->nullable();
            $table->string('seo_twitter_image')->nullable();

            // Authorship
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
