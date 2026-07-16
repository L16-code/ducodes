<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    private array $hireDeveloperSlugs = [
        'zoho', 'gen-ai', 'nodejs', 'java', 'laravel', 'python', 'graphic-designer',
        'mern', 'salesforce', 'react', 'power-bi', 'spring-boot', 'angular', 'seo',
        'ai-ml', 'asp-net', 'mean', 'hubspot', 'devops', 'react-native', 'ionic',
        'flutter', 'php', 'wordpress', 'shopify', 'database-engineer',
    ];

    public function index()
    {
        $urls = Cache::remember('sitemap.xml.urls', now()->addHour(), function () {
            $urls = [
                ['loc' => route('homepage'), 'priority' => '1.0', 'changefreq' => 'weekly'],
                ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
                ['loc' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
                ['loc' => route('blogs'), 'priority' => '0.8', 'changefreq' => 'daily'],
                ['loc' => route('privacy-policy'), 'priority' => '0.3', 'changefreq' => 'yearly'],
                ['loc' => route('terms'), 'priority' => '0.3', 'changefreq' => 'yearly'],
                ['loc' => route('services.index'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ];

            foreach (array_keys(config('service_pages')) as $slug) {
                $urls[] = [
                    'loc' => route('services.show', $slug),
                    'priority' => '0.8',
                    'changefreq' => 'monthly',
                ];
            }

            foreach ($this->hireDeveloperSlugs as $slug) {
                $urls[] = [
                    'loc' => route('hire.developer', $slug),
                    'priority' => '0.7',
                    'changefreq' => 'monthly',
                ];
            }

            Blog::where('status', 'active')->latest('posted_on')->get(['blog_slug', 'updated_at'])
                ->each(function ($blog) use (&$urls) {
                    $urls[] = [
                        'loc' => route('blog.details', $blog->blog_slug),
                        'lastmod' => $blog->updated_at->toAtomString(),
                        'priority' => '0.6',
                        'changefreq' => 'monthly',
                    ];
                });

            return $urls;
        });

        return response()
            ->view('sitemap.xml', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
