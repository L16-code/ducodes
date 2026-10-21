@php
    $cs = $caseStudy ?? null;
    $metrics = old('metric_value') ? null : ($cs->key_metrics ?? []);
    $gallery = $cs->gallery ?? [];
@endphp

<h5 class="mb-3">Basic information</h5>
<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label" for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control"
            value="{{ old('title', $cs->title ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="slug">URL slug</label>
        <input type="text" name="slug" id="slug" class="form-control" pattern="[a-z0-9\-]+"
            value="{{ old('slug', $cs->slug ?? '') }}" placeholder="e.g. acme-digital-transformation" required>
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="short_description">Short description (shown on the case studies listing card)</label>
    <textarea name="short_description" id="short_description" rows="2" class="form-control" maxlength="500" required>{{ old('short_description', $cs->short_description ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="client_name">Client name</label>
        <input type="text" name="client_name" id="client_name" class="form-control"
            value="{{ old('client_name', $cs->client_name ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="client_logo">Client logo</label>
        <input type="file" name="client_logo" id="client_logo" class="form-control" accept="image/*" onchange="previewImage(this, 'client_logo_preview')">
        @if (!empty($cs?->client_logo))
            <img id="client_logo_preview" src="{{ asset('storage/'.$cs->client_logo) }}" class="img-thumbnail mt-2" style="max-height:80px">
        @else
            <img id="client_logo_preview" src="" class="img-thumbnail mt-2 d-none" style="max-height:80px">
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="industry">Industry</label>
        <input type="text" name="industry" id="industry" class="form-control"
            value="{{ old('industry', $cs->industry ?? '') }}" placeholder="e.g. Healthcare">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="service">Primary service</label>
        <input type="text" name="service" id="service" class="form-control"
            value="{{ old('service', $cs->service ?? '') }}" placeholder="e.g. AI/ML">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control"
            value="{{ old('location', $cs->location ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="project_duration">Project duration</label>
        <input type="text" name="project_duration" id="project_duration" class="form-control"
            value="{{ old('project_duration', $cs->project_duration ?? '') }}" placeholder="e.g. 4 months">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="project_type">Project type</label>
        <input type="text" name="project_type" id="project_type" class="form-control"
            value="{{ old('project_type', $cs->project_type ?? '') }}" placeholder="e.g. New build, Migration">
    </div>
</div>

<hr class="my-4">
<h5 class="mb-3">Hero section</h5>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="hero_image">Hero image{{ $cs ? '' : ' (required)' }}</label>
        <input type="file" name="hero_image" id="hero_image" class="form-control" accept="image/*" onchange="previewImage(this, 'hero_image_preview')" @required(!$cs)>
        @if (!empty($cs?->hero_image))
            <img id="hero_image_preview" src="{{ asset('storage/'.$cs->hero_image) }}" class="img-thumbnail mt-2" style="max-height:120px">
        @else
            <img id="hero_image_preview" src="" class="img-thumbnail mt-2 d-none" style="max-height:120px">
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="hero_image_alt">Hero image alt text</label>
        <input type="text" name="hero_image_alt" id="hero_image_alt" class="form-control"
            value="{{ old('hero_image_alt', $cs->hero_image_alt ?? '') }}">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="cta_text">CTA button text</label>
        <input type="text" name="cta_text" id="cta_text" class="form-control"
            value="{{ old('cta_text', $cs->cta_text ?? '') }}" placeholder="e.g. Talk to our experts">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="cta_url">CTA button URL</label>
        <input type="text" name="cta_url" id="cta_url" class="form-control"
            value="{{ old('cta_url', $cs->cta_url ?? '') }}" placeholder="{{ route('contact') }}">
    </div>
</div>

<hr class="my-4">
<h5 class="mb-3">Content</h5>
@foreach ([
    'challenge' => 'Challenge',
    'solution' => 'Solution',
    'implementation' => 'Implementation',
    'results' => 'Results',
    'business_impact' => 'Business impact',
] as $field => $label)
    <div class="mb-3">
        <label class="form-label" for="{{ $field }}">{{ $label }}</label>
        <textarea name="{{ $field }}" id="{{ $field }}" class="form-control rich-text" rows="5">{{ old($field, $cs->$field ?? '') }}</textarea>
    </div>
@endforeach

<hr class="my-4">
<h5 class="mb-3">Technology & key metrics</h5>
<div class="mb-3">
    <label class="form-label" for="tech_stack">Technology stack (comma-separated)</label>
    <input type="text" name="tech_stack" id="tech_stack" class="form-control"
        value="{{ old('tech_stack', $cs ? implode(', ', $cs->tech_stack ?? []) : '') }}"
        placeholder="e.g. Laravel, React, AWS">
</div>

<div class="mb-3">
    <label class="form-label">Key metrics (e.g. "40%" — "Reduction in processing time")</label>
    <div id="metric-rows"></div>
    <button type="button" class="btn btn-sm btn-default" data-repeater-add="metric-rows">+ Add metric</button>
</div>

<hr class="my-4">
<h5 class="mb-3">Testimonial (optional)</h5>
<div class="mb-3">
    <label class="form-label" for="testimonial_quote">Quote</label>
    <textarea name="testimonial_quote" id="testimonial_quote" rows="3" class="form-control">{{ old('testimonial_quote', $cs->testimonial_quote ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="testimonial_person_name">Person name</label>
        <input type="text" name="testimonial_person_name" id="testimonial_person_name" class="form-control"
            value="{{ old('testimonial_person_name', $cs->testimonial_person_name ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="testimonial_designation">Designation</label>
        <input type="text" name="testimonial_designation" id="testimonial_designation" class="form-control"
            value="{{ old('testimonial_designation', $cs->testimonial_designation ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="testimonial_company">Company</label>
        <input type="text" name="testimonial_company" id="testimonial_company" class="form-control"
            value="{{ old('testimonial_company', $cs->testimonial_company ?? '') }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="testimonial_person_image">Person photo</label>
    <input type="file" name="testimonial_person_image" id="testimonial_person_image" class="form-control" accept="image/*" onchange="previewImage(this, 'testimonial_person_image_preview')">
    @if (!empty($cs?->testimonial_person_image))
        <img id="testimonial_person_image_preview" src="{{ asset('storage/'.$cs->testimonial_person_image) }}" class="img-thumbnail mt-2 rounded-circle" style="max-height:80px">
    @else
        <img id="testimonial_person_image_preview" src="" class="img-thumbnail mt-2 d-none" style="max-height:80px">
    @endif
</div>

<hr class="my-4">
<h5 class="mb-3">Gallery</h5>
@if (!empty($gallery))
    <div class="mb-3">
        <label class="form-label">Existing images</label>
        <div class="row g-3">
            @foreach ($gallery as $index => $image)
                <div class="col-md-4">
                    <div class="border rounded p-2">
                        <img src="{{ asset('storage/'.$image['image']) }}" class="img-fluid rounded mb-2" style="max-height:120px">
                        <input type="hidden" name="gallery_existing_path[]" value="{{ $image['image'] }}">
                        <input type="text" name="gallery_existing_alt[]" class="form-control form-control-sm mb-1" placeholder="Alt text" value="{{ $image['alt'] ?? '' }}">
                        <input type="text" name="gallery_existing_caption[]" class="form-control form-control-sm mb-1" placeholder="Caption" value="{{ $image['caption'] ?? '' }}">
                        <div class="form-check">
                            <input type="checkbox" name="gallery_existing_remove[]" value="{{ $image['image'] }}" class="form-check-input" id="gallery-remove-{{ $index }}">
                            <label class="form-check-label small" for="gallery-remove-{{ $index }}">Remove</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<div class="mb-3">
    <label class="form-label">Add images</label>
    <div id="gallery-new-rows"></div>
    <button type="button" class="btn btn-sm btn-default" data-repeater-add="gallery-new-rows">+ Add image</button>
</div>

<hr class="my-4">
<h5 class="mb-3">Publishing</h5>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="status">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="draft" @selected(old('status', $cs->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $cs->status ?? 'draft') === 'published')>Published</option>
            <option value="unpublished" @selected(old('status', $cs->status ?? 'draft') === 'unpublished')>Unpublished</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="sort_order">Sort order (lower shows first)</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
            value="{{ old('sort_order', $cs->sort_order ?? 0) }}">
    </div>
    <div class="col-md-4 mb-3 d-flex align-items-end">
        <div class="form-check">
            <input type="hidden" name="featured" value="0">
            <input type="checkbox" name="featured" id="featured" class="form-check-input" value="1"
                @checked(old('featured', $cs->featured ?? false))>
            <label class="form-check-label" for="featured">Featured case study</label>
        </div>
    </div>
</div>

<hr class="my-4">
<h5 class="mb-3">SEO</h5>
<p class="text-body-secondary small">Leave any of these blank to fall back to sensible defaults generated from the content above.</p>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_title">SEO title</label>
        <input type="text" name="seo_title" id="seo_title" class="form-control" value="{{ old('seo_title', $cs->seo_title ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_focus_keyword">Focus keyword</label>
        <input type="text" name="seo_focus_keyword" id="seo_focus_keyword" class="form-control" value="{{ old('seo_focus_keyword', $cs->seo_focus_keyword ?? '') }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="seo_meta_description">Meta description</label>
    <textarea name="seo_meta_description" id="seo_meta_description" rows="2" class="form-control">{{ old('seo_meta_description', $cs->seo_meta_description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label" for="seo_canonical_url">Canonical URL</label>
    <input type="text" name="seo_canonical_url" id="seo_canonical_url" class="form-control" value="{{ old('seo_canonical_url', $cs->seo_canonical_url ?? '') }}">
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_og_title">OG title</label>
        <input type="text" name="seo_og_title" id="seo_og_title" class="form-control" value="{{ old('seo_og_title', $cs->seo_og_title ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_og_image">OG image URL</label>
        <input type="text" name="seo_og_image" id="seo_og_image" class="form-control" value="{{ old('seo_og_image', $cs->seo_og_image ?? '') }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="seo_og_description">OG description</label>
    <textarea name="seo_og_description" id="seo_og_description" rows="2" class="form-control">{{ old('seo_og_description', $cs->seo_og_description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_twitter_title">Twitter title</label>
        <input type="text" name="seo_twitter_title" id="seo_twitter_title" class="form-control" value="{{ old('seo_twitter_title', $cs->seo_twitter_title ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="seo_twitter_image">Twitter image URL</label>
        <input type="text" name="seo_twitter_image" id="seo_twitter_image" class="form-control" value="{{ old('seo_twitter_image', $cs->seo_twitter_image ?? '') }}">
    </div>
</div>
<div class="mb-4">
    <label class="form-label" for="seo_twitter_description">Twitter description</label>
    <textarea name="seo_twitter_description" id="seo_twitter_description" rows="2" class="form-control">{{ old('seo_twitter_description', $cs->seo_twitter_description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('admin.case-studies.index') }}" class="btn btn-default">Cancel</a>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
<script>
function previewImage(input, previewId) {
    const img = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            img.src = e.target.result;
            img.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('.rich-text').summernote({
        height: 180,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
        ],
    });
});

(function () {
    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    }

    function makeMetricRow(value, label, description) {
        const container = document.getElementById('metric-rows');
        const row = document.createElement('div');
        row.className = 'row repeater-row mb-2 align-items-start';
        row.innerHTML = `
            <div class="col-md-2">
                <input type="text" name="metric_value[]" class="form-control mb-1" placeholder="Value (e.g. 40%)" value="${escapeHtml(value)}">
            </div>
            <div class="col-md-3">
                <input type="text" name="metric_label[]" class="form-control mb-1" placeholder="Label" value="${escapeHtml(label)}">
            </div>
            <div class="col-md-6">
                <input type="text" name="metric_description[]" class="form-control mb-1" placeholder="Description (optional)" value="${escapeHtml(description)}">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-danger" data-repeater-remove>&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    function makeGalleryRow() {
        const container = document.getElementById('gallery-new-rows');
        const row = document.createElement('div');
        row.className = 'row repeater-row mb-2 align-items-start';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="file" name="gallery_new_file[]" class="form-control mb-1" accept="image/*">
            </div>
            <div class="col-md-3">
                <input type="text" name="gallery_new_alt[]" class="form-control mb-1" placeholder="Alt text">
            </div>
            <div class="col-md-4">
                <input type="text" name="gallery_new_caption[]" class="form-control mb-1" placeholder="Caption">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-danger" data-repeater-remove>&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    const metrics = @json($metrics ?? []);
    const oldMetricValues = @json(old('metric_value', []));
    const oldMetricLabels = @json(old('metric_label', []));
    const oldMetricDescriptions = @json(old('metric_description', []));

    if (oldMetricValues.length) {
        oldMetricValues.forEach((v, i) => makeMetricRow(v || '', oldMetricLabels[i] || '', oldMetricDescriptions[i] || ''));
    } else if (metrics.length) {
        metrics.forEach((row) => makeMetricRow(row.value || '', row.label || '', row.description || ''));
    } else {
        makeMetricRow('', '', '');
    }

    makeGalleryRow();

    document.querySelectorAll('[data-repeater-add]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-repeater-add');
            if (targetId === 'metric-rows') {
                makeMetricRow('', '', '');
            } else if (targetId === 'gallery-new-rows') {
                makeGalleryRow();
            }
        });
    });

    document.addEventListener('click', (e) => {
        if (e.target.matches('[data-repeater-remove]')) {
            e.target.closest('.repeater-row').remove();
        }
    });
})();
</script>
@endpush
