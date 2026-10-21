<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseStudyAdminController extends Controller
{
    public function index(Request $request)
    {
        $industries = CaseStudy::whereNotNull('industry')->orderBy('industry')->distinct()->pluck('industry');
        $services = CaseStudy::whereNotNull('service')->orderBy('service')->distinct()->pluck('service');

        $caseStudies = CaseStudy::when($request->filled('industry'), fn ($q) => $q->where('industry', $request->get('industry')))
            ->when($request->filled('service'), fn ($q) => $q->where('service', $request->get('service')))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->get('status')))
            ->when($request->filled('featured'), fn ($q) => $q->where('featured', $request->get('featured') === '1'))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.case-studies.index', compact('caseStudies', 'industries', 'services'));
    }

    public function create()
    {
        return view('admin.case-studies.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $validated['created_by'] = Auth::id();
        $validated['updated_by'] = Auth::id();

        $caseStudy = new CaseStudy($validated);
        $this->applyUploads($request, $caseStudy);
        $caseStudy->save();

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $validated = $this->validated($request, $caseStudy);
        $validated['updated_by'] = Auth::id();

        $caseStudy->fill($validated);
        $this->applyUploads($request, $caseStudy);
        $caseStudy->save();

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study deleted.');
    }

    public function publish(CaseStudy $caseStudy)
    {
        $caseStudy->update([
            'status' => 'published',
            'published_at' => $caseStudy->published_at ?? now(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study published.');
    }

    public function unpublish(CaseStudy $caseStudy)
    {
        $caseStudy->update([
            'status' => 'unpublished',
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('admin.case-studies.index')->with('status', 'Case study unpublished.');
    }

    private function validated(Request $request, ?CaseStudy $caseStudy = null): array
    {
        $data = $request->validate([
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:case_studies,slug,' . ($caseStudy->id ?? 'NULL') . ',id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'client_name' => 'nullable|string|max:255',
            'client_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'industry' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'project_duration' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',

            'hero_image' => ($caseStudy ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_image_alt' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'cta_url' => 'nullable|string|max:500',

            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'implementation' => 'nullable|string',
            'results' => 'nullable|string',
            'business_impact' => 'nullable|string',

            'tech_stack' => 'nullable|string',

            'metric_value' => 'array',
            'metric_value.*' => 'nullable|string|max:50',
            'metric_label' => 'array',
            'metric_label.*' => 'nullable|string|max:255',
            'metric_description' => 'array',
            'metric_description.*' => 'nullable|string|max:255',

            'testimonial_quote' => 'nullable|string|max:2000',
            'testimonial_person_name' => 'nullable|string|max:255',
            'testimonial_designation' => 'nullable|string|max:255',
            'testimonial_company' => 'nullable|string|max:255',
            'testimonial_person_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'gallery_new_file' => 'array',
            'gallery_new_file.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_new_alt' => 'array',
            'gallery_new_alt.*' => 'nullable|string|max:255',
            'gallery_new_caption' => 'array',
            'gallery_new_caption.*' => 'nullable|string|max:255',
            'gallery_existing_path' => 'array',
            'gallery_existing_path.*' => 'nullable|string',
            'gallery_existing_alt' => 'array',
            'gallery_existing_alt.*' => 'nullable|string|max:255',
            'gallery_existing_caption' => 'array',
            'gallery_existing_caption.*' => 'nullable|string|max:255',
            'gallery_existing_remove' => 'array',
            'gallery_existing_remove.*' => 'nullable|string',

            'featured' => 'sometimes|boolean',
            'status' => 'required|in:draft,published,unpublished',
            'sort_order' => 'nullable|integer|min:0',

            'seo_title' => 'nullable|string|max:255',
            'seo_meta_description' => 'nullable|string|max:500',
            'seo_focus_keyword' => 'nullable|string|max:255',
            'seo_canonical_url' => 'nullable|string|max:500',
            'seo_og_title' => 'nullable|string|max:255',
            'seo_og_description' => 'nullable|string|max:500',
            'seo_og_image' => 'nullable|string|max:500',
            'seo_twitter_title' => 'nullable|string|max:255',
            'seo_twitter_description' => 'nullable|string|max:500',
            'seo_twitter_image' => 'nullable|string|max:500',
        ]);

        $wasPublished = $caseStudy?->status === 'published';
        $willBePublished = $data['status'] === 'published';

        return [
            'slug' => $data['slug'],
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'client_name' => $data['client_name'] ?: null,
            'industry' => $data['industry'] ?: null,
            'service' => $data['service'] ?: null,
            'location' => $data['location'] ?: null,
            'project_duration' => $data['project_duration'] ?: null,
            'project_type' => $data['project_type'] ?: null,

            'hero_image_alt' => $data['hero_image_alt'] ?: null,
            'cta_text' => $data['cta_text'] ?: null,
            'cta_url' => $data['cta_url'] ?: null,

            'challenge' => $data['challenge'] ?: null,
            'solution' => $data['solution'] ?: null,
            'implementation' => $data['implementation'] ?: null,
            'results' => $data['results'] ?: null,
            'business_impact' => $data['business_impact'] ?: null,

            'tech_stack' => collect(explode(',', $data['tech_stack'] ?? ''))
                ->map(fn ($t) => trim($t))
                ->filter()
                ->values()
                ->all(),

            'key_metrics' => $this->zipMetrics(
                $data['metric_value'] ?? [],
                $data['metric_label'] ?? [],
                $data['metric_description'] ?? []
            ),

            'testimonial_quote' => $data['testimonial_quote'] ?: null,
            'testimonial_person_name' => $data['testimonial_person_name'] ?: null,
            'testimonial_designation' => $data['testimonial_designation'] ?: null,
            'testimonial_company' => $data['testimonial_company'] ?: null,

            'featured' => $request->boolean('featured'),
            'status' => $data['status'],
            'published_at' => $willBePublished ? ($wasPublished ? $caseStudy->published_at : now()) : $caseStudy?->published_at,
            'sort_order' => $data['sort_order'] ?? 0,

            'seo_title' => $data['seo_title'] ?: null,
            'seo_meta_description' => $data['seo_meta_description'] ?: null,
            'seo_focus_keyword' => $data['seo_focus_keyword'] ?: null,
            'seo_canonical_url' => $data['seo_canonical_url'] ?: null,
            'seo_og_title' => $data['seo_og_title'] ?: null,
            'seo_og_description' => $data['seo_og_description'] ?: null,
            'seo_og_image' => $data['seo_og_image'] ?: null,
            'seo_twitter_title' => $data['seo_twitter_title'] ?: null,
            'seo_twitter_description' => $data['seo_twitter_description'] ?: null,
            'seo_twitter_image' => $data['seo_twitter_image'] ?: null,
        ];
    }

    /**
     * Handles every file upload field plus the gallery's keep/remove/add
     * bookkeeping. Kept separate from validated() because it mutates the
     * model directly (uploaded paths aren't part of the validated array —
     * mirrors how Blog's controller only touches thumbnail/main image paths
     * when a new file is actually present).
     */
    private function applyUploads(Request $request, CaseStudy $caseStudy): void
    {
        if ($request->hasFile('client_logo')) {
            $caseStudy->client_logo = $request->file('client_logo')->store('case-studies/clients', 'public');
        }

        if ($request->hasFile('hero_image')) {
            $caseStudy->hero_image = $request->file('hero_image')->store('case-studies/hero', 'public');
        }

        if ($request->hasFile('testimonial_person_image')) {
            $caseStudy->testimonial_person_image = $request->file('testimonial_person_image')->store('case-studies/testimonials', 'public');
        }

        $caseStudy->gallery = $this->buildGallery($request);
    }

    private function buildGallery(Request $request): array
    {
        $removed = array_flip($request->input('gallery_existing_remove', []));
        $existingPaths = $request->input('gallery_existing_path', []);
        $existingAlts = $request->input('gallery_existing_alt', []);
        $existingCaptions = $request->input('gallery_existing_caption', []);

        $rows = [];

        foreach ($existingPaths as $index => $path) {
            if ($path === '' || isset($removed[$path])) {
                continue;
            }

            $rows[] = [
                'image' => $path,
                'alt' => trim($existingAlts[$index] ?? ''),
                'caption' => trim($existingCaptions[$index] ?? ''),
            ];
        }

        $newFiles = $request->file('gallery_new_file', []);
        $newAlts = $request->input('gallery_new_alt', []);
        $newCaptions = $request->input('gallery_new_caption', []);

        foreach ($newFiles as $index => $file) {
            if (!$file) {
                continue;
            }

            $rows[] = [
                'image' => $file->store('case-studies/gallery', 'public'),
                'alt' => trim($newAlts[$index] ?? ''),
                'caption' => trim($newCaptions[$index] ?? ''),
            ];
        }

        return $rows;
    }

    private function zipMetrics(array $values, array $labels, array $descriptions): array
    {
        $rows = [];

        foreach ($values as $index => $value) {
            $value = trim($value ?? '');
            $label = trim($labels[$index] ?? '');
            $description = trim($descriptions[$index] ?? '');

            if ($value === '' && $label === '') {
                continue;
            }

            $rows[] = ['value' => $value, 'label' => $label, 'description' => $description];
        }

        return $rows;
    }
}
