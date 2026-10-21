<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index(Request $request)
    {
        $industries = CaseStudy::where('status', 'published')->whereNotNull('industry')->orderBy('industry')->distinct()->pluck('industry');
        $services = CaseStudy::where('status', 'published')->whereNotNull('service')->orderBy('service')->distinct()->pluck('service');

        $caseStudies = CaseStudy::where('status', 'published')
            ->when($request->filled('industry'), fn ($q) => $q->where('industry', $request->get('industry')))
            ->when($request->filled('service'), fn ($q) => $q->where('service', $request->get('service')))
            ->when($request->filled('tech'), fn ($q) => $q->whereJsonContains('tech_stack', $request->get('tech')))
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->get();

        return view('frontend.pages.case-studies.index', compact('caseStudies', 'industries', 'services'));
    }

    public function show(string $slug, Request $request)
    {
        $caseStudy = CaseStudy::where('slug', $slug)->first();

        if (!$caseStudy) {
            abort(404);
        }

        $isPreview = $request->hasValidSignature();

        if ($caseStudy->status !== 'published' && !$isPreview) {
            abort(404);
        }

        $relatedCaseStudies = collect();

        $hasRelationSignal = $caseStudy->industry || $caseStudy->service || !empty($caseStudy->tech_stack);

        if ($hasRelationSignal) {
            $relatedCaseStudies = CaseStudy::where('status', 'published')
                ->where('id', '!=', $caseStudy->id)
                ->where(function ($query) use ($caseStudy) {
                    $query->when($caseStudy->industry, fn ($q) => $q->orWhere('industry', $caseStudy->industry))
                        ->when($caseStudy->service, fn ($q) => $q->orWhere('service', $caseStudy->service));

                    foreach ($caseStudy->tech_stack ?? [] as $tech) {
                        $query->orWhereJsonContains('tech_stack', $tech);
                    }
                })
                ->orderByDesc('featured')
                ->limit(3)
                ->get();
        }

        return view('frontend.pages.case-studies.show', compact('caseStudy', 'relatedCaseStudies', 'isPreview'));
    }
}
