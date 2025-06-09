<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Define the table name if it differs from the default convention
    protected $table = 'blogs';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'blog_title',
        'blog_slug',
        'blog_type',
        'thumbnail_img',
        'main_img',
        'posted_on',
        'short_desc',
        'main_desc',
        'tags',
        'seo_meta',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'tags' => 'array', // Automatically cast JSON to array
        'seo_meta' => 'array', // Automatically cast JSON to array
        'posted_on' => 'datetime', // Cast to Carbon instance
    ];

    // Add any relationships if needed
    // Example: If blogs belong to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route('blog.details', ['slug' => $this->blog_slug]);
    }
}
