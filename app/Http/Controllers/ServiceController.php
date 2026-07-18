<?php

namespace App\Http\Controllers;

use App\Models\Faq;

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

        // FAQs are managed through /admin/faqs now — the config array's
        // 'faqs' key is only used as a fallback until a service has been
        // seeded/edited in the database.
        $dbFaqs = Faq::where('service_slug', $slug)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(['question', 'answer'])
            ->map(fn ($faq) => ['question' => $faq->question, 'answer' => $faq->answer])
            ->all();

        if (!empty($dbFaqs)) {
            $service['faqs'] = $dbFaqs;
        }

        $relatedServices = collect($service['related'] ?? [])
            ->filter(fn ($relatedSlug) => array_key_exists($relatedSlug, $services))
            ->map(fn ($relatedSlug) => $services[$relatedSlug] + ['slug' => $relatedSlug])
            ->values();

        return view('frontend.pages.services.show', compact('service', 'relatedServices'));
    }
}
