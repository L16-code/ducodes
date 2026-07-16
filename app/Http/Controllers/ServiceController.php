<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        $services = config('service_pages');

        return view('frontend.pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $services = config('service_pages');

        if (!array_key_exists($slug, $services)) {
            abort(404);
        }

        $service = $services[$slug] + ['slug' => $slug];

        $relatedServices = collect($service['related'] ?? [])
            ->filter(fn ($relatedSlug) => array_key_exists($relatedSlug, $services))
            ->map(fn ($relatedSlug) => $services[$relatedSlug] + ['slug' => $relatedSlug])
            ->values();

        return view('frontend.pages.services.show', compact('service', 'relatedServices'));
    }
}
