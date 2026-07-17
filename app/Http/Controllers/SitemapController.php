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

    public function llmsTxt()
    {
        $content = Cache::remember('llms.txt.content', now()->addHour(), function () {
            $services = config('service_pages');
            $latestBlogs = Blog::where('status', 'active')->latest('posted_on')->take(10)->get();

            $lines = [];
            $lines[] = '# DuCodes';
            $lines[] = '';
            $lines[] = '> DuCodes is a custom software development company based in Jaipur, India, building web platforms, mobile apps, AI solutions, and CRM/ERP integrations for businesses worldwide.';
            $lines[] = '';
            $lines[] = 'DuCodes builds with Laravel, React, and Node.js, and integrates business systems including Zoho, Salesforce, and HubSpot. Get in touch at ' . route('contact') . ' or ' . config('seo.organization.email') . '.';
            $lines[] = '';
            $lines[] = '## Services';
            $lines[] = '';
            foreach ($services as $slug => $service) {
                $lines[] = '- [' . $service['title'] . '](' . route('services.show', $slug) . '): ' . $service['quick_answer'];
            }
            $lines[] = '';
            $lines[] = '## Company';
            $lines[] = '';
            $lines[] = '- [About](' . route('about') . '): Who DuCodes is and what the company builds.';
            $lines[] = '- [Contact](' . route('contact') . '): Get in touch for a project quote.';
            $lines[] = '- [Blog](' . route('blogs') . '): Articles on Laravel, AI, CRM/ERP integration, and web development.';
            $lines[] = '- [Privacy Policy](' . route('privacy-policy') . ')';
            $lines[] = '- [Terms and Conditions](' . route('terms') . ')';

            if ($latestBlogs->count() > 0) {
                $lines[] = '';
                $lines[] = '## Recent blog posts';
                $lines[] = '';
                foreach ($latestBlogs as $blog) {
                    $lines[] = '- [' . $blog->blog_title . '](' . route('blog.details', $blog->blog_slug) . '): ' . $blog->short_desc;
                }
            }

            return implode("\n", $lines) . "\n";
        });

        return response($content, 200)
            ->header('Content-Type', 'text/markdown; charset=UTF-8');
    }
}
