<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('service_slug')->orderBy('sort_order')->paginate(30);
        $services = config('service_pages');

        return view('admin.faqs.index', compact('faqs', 'services'));
    }

    public function create()
    {
        $services = config('service_pages');

        return view('admin.faqs.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $services = config('service_pages');

        return view('admin.faqs.edit', compact('faq', 'services'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $this->validated($request);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'service_slug' => 'nullable|string|max:255',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]) + ['is_active' => $request->boolean('is_active')];
    }
}
