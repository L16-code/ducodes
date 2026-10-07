<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'category',
        'title',
        'meta_description',
        'tagline',
        'quick_answer',
        'intro',
        'why_ducodes',
        'process',
        'tech_stack',
        'related',
        'hire_developer_slug',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'intro' => 'array',
        'why_ducodes' => 'array',
        'process' => 'array',
        'tech_stack' => 'array',
        'related' => 'array',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
