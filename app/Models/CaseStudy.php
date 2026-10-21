<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'client_name',
        'client_logo',
        'industry',
        'service',
        'location',
        'project_duration',
        'project_type',
        'hero_image',
        'hero_image_alt',
        'cta_text',
        'cta_url',
        'challenge',
        'solution',
        'implementation',
        'results',
        'business_impact',
        'tech_stack',
        'key_metrics',
        'gallery',
        'testimonial_quote',
        'testimonial_person_name',
        'testimonial_designation',
        'testimonial_company',
        'testimonial_person_image',
        'featured',
        'status',
        'published_at',
        'sort_order',
        'seo_title',
        'seo_meta_description',
        'seo_focus_keyword',
        'seo_canonical_url',
        'seo_og_title',
        'seo_og_description',
        'seo_og_image',
        'seo_twitter_title',
        'seo_twitter_description',
        'seo_twitter_image',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'key_metrics' => 'array',
        'gallery' => 'array',
        'featured' => 'boolean',
        'published_at' => 'datetime',
        'sort_order' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
