<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceAdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Service::orderBy('category')->distinct()->pluck('category');

        $services = Service::when($request->filled('category'), fn ($query) => $query->where('category', $request->get('category')))
            ->orderBy('category')
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function create()
    {
        $allServices = Service::orderBy('title')->get();

        return view('admin.services.create', compact('allServices'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('status', 'Service page created successfully.');
    }

    public function edit(Service $service)
    {
        $allServices = Service::where('id', '!=', $service->id)->orderBy('title')->get();

        return view('admin.services.edit', compact('service', 'allServices'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validated($request, $service);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('status', 'Service page updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Service page deleted.');
    }

    private function validated(Request $request, ?Service $service = null): array
    {
        $data = $request->validate([
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:services,slug,' . ($service->id ?? 'NULL') . ',id',
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
            'tagline' => 'required|string|max:255',
            'quick_answer' => 'required|string',
            'intro' => 'required|string',
            'why_ducodes_title' => 'array',
            'why_ducodes_title.*' => 'nullable|string|max:255',
            'why_ducodes_body' => 'array',
            'why_ducodes_body.*' => 'nullable|string',
            'process_title' => 'array',
            'process_title.*' => 'nullable|string|max:255',
            'process_body' => 'array',
            'process_body.*' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'related' => 'nullable|array',
            'related.*' => 'string',
            'hire_developer_slug' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        return [
            'slug' => $data['slug'],
            'category' => $data['category'],
            'title' => $data['title'],
            'meta_description' => $data['meta_description'],
            'tagline' => $data['tagline'],
            'quick_answer' => $data['quick_answer'],
            'intro' => collect(preg_split('/\r?\n\r?\n/', trim($data['intro'])))
                ->map(fn ($p) => trim($p))
                ->filter()
                ->values()
                ->all(),
            'why_ducodes' => $this->zipRepeater($data['why_ducodes_title'] ?? [], $data['why_ducodes_body'] ?? []),
            'process' => $this->zipRepeater($data['process_title'] ?? [], $data['process_body'] ?? []),
            'tech_stack' => collect(explode(',', $data['tech_stack'] ?? ''))
                ->map(fn ($t) => trim($t))
                ->filter()
                ->values()
                ->all(),
            'related' => array_values($data['related'] ?? []),
            'hire_developer_slug' => $data['hire_developer_slug'] ?: null,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ];
    }

    private function zipRepeater(array $titles, array $bodies): array
    {
        $rows = [];

        foreach ($titles as $index => $title) {
            $title = trim($title ?? '');
            $body = trim($bodies[$index] ?? '');

            if ($title === '' && $body === '') {
                continue;
            }

            $rows[] = ['title' => $title, 'body' => $body];
        }

        return $rows;
    }
}
