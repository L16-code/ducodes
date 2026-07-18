<div class="mb-3">
    <label class="form-label" for="service_slug">Service (leave blank for general/site-wide)</label>
    <select name="service_slug" id="service_slug" class="form-select">
        <option value="">General / Site-wide</option>
        @foreach ($services as $slug => $service)
            <option value="{{ $slug }}" @selected(old('service_slug', $faq->service_slug ?? '') === $slug)>
                {{ $service['title'] }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label" for="question">Question</label>
    <input type="text" name="question" id="question" class="form-control"
        value="{{ old('question', $faq->question ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label" for="answer">Answer</label>
    <textarea name="answer" id="answer" rows="5" class="form-control" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="sort_order">Sort order</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
            value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
    </div>
    <div class="col-md-6 mb-3 d-flex align-items-end">
        <div class="form-check">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
                @checked(old('is_active', $faq->is_active ?? true))>
            <label class="form-check-label" for="is_active">Active (visible on the site)</label>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('admin.faqs.index') }}" class="btn btn-default">Cancel</a>
