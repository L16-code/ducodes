@php
    $s = $service ?? null;
    $whyDucodes = old('why_ducodes_title') ? null : ($s->why_ducodes ?? []);
    $process = old('process_title') ? null : ($s->process ?? []);
@endphp

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label" for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control"
            value="{{ old('title', $s->title ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="slug">URL slug</label>
        <input type="text" name="slug" id="slug" class="form-control" pattern="[a-z0-9\-]+"
            value="{{ old('slug', $s->slug ?? '') }}" placeholder="e.g. ai-chatbot-development" required>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="category">Category (groups this page in the menu)</label>
        <input type="text" name="category" id="category" class="form-control" list="category-options"
            value="{{ old('category', $s->category ?? 'Development') }}" required>
        <datalist id="category-options">
            <option value="Development">
            <option value="AI & Machine Learning">
            <option value="Business Integrations">
            <option value="Design & Data">
        </datalist>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label" for="sort_order">Sort order</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
            value="{{ old('sort_order', $s->sort_order ?? 0) }}">
    </div>
    <div class="col-md-3 mb-3 d-flex align-items-end">
        <div class="form-check">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                @checked(old('is_active', $s->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active (visible on the site)</label>
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="tagline">Tagline</label>
    <input type="text" name="tagline" id="tagline" class="form-control"
        value="{{ old('tagline', $s->tagline ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label" for="meta_description">Meta description (for search engines, ~150-160 characters)</label>
    <textarea name="meta_description" id="meta_description" rows="2" class="form-control" required>{{ old('meta_description', $s->meta_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="quick_answer">Quick answer (shown in an "In short" box at the top of the page — also used for AI/answer-engine summaries)</label>
    <textarea name="quick_answer" id="quick_answer" rows="3" class="form-control" required>{{ old('quick_answer', $s->quick_answer ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="intro">Introduction paragraphs (leave a blank line between paragraphs)</label>
    <textarea name="intro" id="intro" rows="6" class="form-control" required>{{ old('intro', $s ? implode("\n\n", $s->intro ?? []) : '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Why DuCodes (a short list of reasons/points)</label>
    <div id="why-ducodes-rows"></div>
    <button type="button" class="btn btn-sm btn-default" data-repeater-add="why-ducodes-rows">+ Add point</button>
</div>

<div class="mb-3">
    <label class="form-label">Process steps</label>
    <div id="process-rows"></div>
    <button type="button" class="btn btn-sm btn-default" data-repeater-add="process-rows">+ Add step</button>
</div>

<div class="mb-3">
    <label class="form-label" for="tech_stack">Technology used (comma-separated)</label>
    <input type="text" name="tech_stack" id="tech_stack" class="form-control"
        value="{{ old('tech_stack', $s ? implode(', ', $s->tech_stack ?? []) : '') }}"
        placeholder="e.g. Laravel, MySQL, Redis">
</div>

<div class="mb-3">
    <label class="form-label" for="related">Related services (hold Ctrl/Cmd to select multiple)</label>
    <select name="related[]" id="related" class="form-select" multiple size="8">
        @foreach ($allServices as $related)
            <option value="{{ $related->slug }}"
                @selected(collect(old('related', $s->related ?? []))->contains($related->slug))>
                {{ $related->title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label" for="hire_developer_slug">"Hire a developer" link slug (optional, leave blank to hide that button)</label>
    <input type="text" name="hire_developer_slug" id="hire_developer_slug" class="form-control"
        value="{{ old('hire_developer_slug', $s->hire_developer_slug ?? '') }}" placeholder="e.g. gen-ai">
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('admin.services.index') }}" class="btn btn-default">Cancel</a>

@push('scripts')
<script>
(function () {
    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    }

    function makeRow(container, titleName, bodyName, title, body) {
        const row = document.createElement('div');
        row.className = 'row repeater-row mb-2 align-items-start';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="text" name="${titleName}[]" class="form-control mb-1 mb-md-0" placeholder="Title" value="${escapeHtml(title)}">
            </div>
            <div class="col-md-7">
                <textarea name="${bodyName}[]" class="form-control" rows="2" placeholder="Body">${escapeHtml(body)}</textarea>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-sm btn-danger" data-repeater-remove>&times;</button>
            </div>
        `;
        container.appendChild(row);
    }

    const whyDucodes = @json($whyDucodes ?? []);
    const process = @json($process ?? []);
    const oldWhyTitles = @json(old('why_ducodes_title', []));
    const oldWhyBodies = @json(old('why_ducodes_body', []));
    const oldProcessTitles = @json(old('process_title', []));
    const oldProcessBodies = @json(old('process_body', []));

    const whyContainer = document.getElementById('why-ducodes-rows');
    const processContainer = document.getElementById('process-rows');

    if (oldWhyTitles.length) {
        oldWhyTitles.forEach((t, i) => makeRow(whyContainer, 'why_ducodes_title', 'why_ducodes_body', t || '', oldWhyBodies[i] || ''));
    } else if (whyDucodes.length) {
        whyDucodes.forEach((row) => makeRow(whyContainer, 'why_ducodes_title', 'why_ducodes_body', row.title || '', row.body || ''));
    } else {
        makeRow(whyContainer, 'why_ducodes_title', 'why_ducodes_body', '', '');
    }

    if (oldProcessTitles.length) {
        oldProcessTitles.forEach((t, i) => makeRow(processContainer, 'process_title', 'process_body', t || '', oldProcessBodies[i] || ''));
    } else if (process.length) {
        process.forEach((row) => makeRow(processContainer, 'process_title', 'process_body', row.title || '', row.body || ''));
    } else {
        makeRow(processContainer, 'process_title', 'process_body', '', '');
    }

    document.querySelectorAll('[data-repeater-add]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-repeater-add');
            const container = document.getElementById(targetId);
            const titleName = targetId === 'why-ducodes-rows' ? 'why_ducodes_title' : 'process_title';
            const bodyName = targetId === 'why-ducodes-rows' ? 'why_ducodes_body' : 'process_body';
            makeRow(container, titleName, bodyName, '', '');
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
