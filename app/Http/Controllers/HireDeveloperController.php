<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HireDeveloperController extends Controller
{
    /**
     * List of available developer categories
     */
    private $categories = [
        'zoho' => 'Zoho',
        'gen-ai' => 'Gen AI',
        'nodejs' => 'Node.js',
        'java' => 'Java',
        'laravel' => 'Laravel',
        'python' => 'Python',
        'graphic-designer' => 'Graphic Designer',
        'mern' => 'MERN',
        'salesforce' => 'Salesforce',
        'react' => 'React',
        'power-bi' => 'Power BI',
        'spring-boot' => 'Spring Boot',
        'angular' => 'Angular',
        'seo' => 'SEO',
        'ai-ml' => 'AI/ML',
        'asp-net' => 'ASP.NET',
        'mean' => 'MEAN',
        'hubspot' => 'HubSpot',
        'devops' => 'DevOps',
        'react-native' => 'React Native',
        'ionic' => 'Ionic',
        'flutter' => 'Flutter',
        'php' => 'PHP',
        'wordpress' => 'WordPress',
        'shopify' => 'Shopify',
        'database-engineer' => 'Database Engineer',
    ];

    /**
     * Show hire developer page for specific category
     */
    public function show($slug)
    {
        // Check if category exists
        if (!array_key_exists($slug, $this->categories)) {
            abort(404);
        }

        // Check if view exists, otherwise use a generic template
        $viewPath = "frontend.pages.hire-developer.{$slug}";
        
        if (!view()->exists($viewPath)) {
            // Use generic template if specific view doesn't exist
            return view('frontend.pages.hire-developer.generic', [
                'slug' => $slug,
                'title' => $this->categories[$slug],
            ]);
        }

        return view($viewPath);
    }

    /**
     * Get all categories for sitemap or listing
     */
    public function getAllCategories()
    {
        return $this->categories;
    }
}
