<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('category')
            ->orderBy('sort_order')
            ->get()
            ->keyBy('slug');

        return view('frontend.pages.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $serviceModel = Service::where('slug', $slug)->where('is_active', true)->first();

        if (!$serviceModel) {
            abort(404);
        }

        $service = $serviceModel->toArray();

        // FAQs are managed through /admin/faqs.
        $dbFaqs = Faq::where('service_slug', $slug)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(['question', 'answer'])
            ->map(fn ($faq) => ['question' => $faq->question, 'answer' => $faq->answer])
            ->all();

        $service['faqs'] = $dbFaqs;

        $relatedLookup = Service::whereIn('slug', $service['related'] ?? [])
            ->where('is_active', true)
            ->get()
            ->keyBy('slug');

        $relatedServices = collect($service['related'] ?? [])
            ->map(fn ($relatedSlug) => $relatedLookup->get($relatedSlug))
            ->filter()
            ->values();

        return view('frontend.pages.services.show', compact('service', 'relatedServices'));
    }
}
