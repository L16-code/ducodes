@extends('admin.layouts.main')

@section('content')
    <a href="{{ route('admin.case-studies.create') }}" class="float-xl-end btn btn-primary">Add case study</a>
    <h1 class="page-header">Case studies</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All case studies ({{ $caseStudies->total() }})</h4>
                </div>
                <div class="panel-body">
                    <form method="GET" action="{{ route('admin.case-studies.index') }}" class="row g-2 align-items-end mb-3">
                        <div class="col-md-3">
                            <label class="form-label" for="industry">Industry</label>
                            <select name="industry" id="industry" class="form-select" onchange="this.form.submit()">
                                <option value="">All industries</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry }}" @selected(request('industry') === $industry)>{{ $industry }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="service">Service</label>
                            <select name="service" id="service" class="form-select" onchange="this.form.submit()">
                                <option value="">All services</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service }}" @selected(request('service') === $service)>{{ $service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                                <option value="">All statuses</option>
                                <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                                <option value="published" @selected(request('status') === 'published')>Published</option>
                                <option value="unpublished" @selected(request('status') === 'unpublished')>Unpublished</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="featured">Featured</label>
                            <select name="featured" id="featured" class="form-select" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="1" @selected(request('featured') === '1')>Featured only</option>
                            </select>
                        </div>
                        @if (request()->anyFilled(['industry', 'service', 'status', 'featured']))
                            <div class="col-md-2">
                                <a href="{{ route('admin.case-studies.index') }}" class="btn btn-default">Clear filters</a>
                            </div>
                        @endif
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Industry</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Published</th>
                                    <th>Updated</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($caseStudies as $caseStudy)
                                    <tr>
                                        <td>{{ $caseStudy->title }}</td>
                                        <td>{{ $caseStudy->client_name ?: '—' }}</td>
                                        <td>{{ $caseStudy->industry ?: '—' }}</td>
                                        <td>{{ $caseStudy->service ?: '—' }}</td>
                                        <td>
                                            @php
                                                $statusColors = ['draft' => 'secondary', 'published' => 'success', 'unpublished' => 'danger'];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$caseStudy->status] ?? 'secondary' }}">
                                                {{ ucfirst($caseStudy->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($caseStudy->featured)
                                                <span class="badge bg-primary">Featured</span>
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td>{{ $caseStudy->published_at?->format('M j, Y') ?: '—' }}</td>
                                        <td>{{ $caseStudy->updated_at->format('M j, Y') }}</td>
                                        <td class="d-flex gap-1 flex-wrap">
                                            <a href="{{ URL::signedRoute('case-studies.show', ['slug' => $caseStudy->slug]) }}" target="_blank" class="btn btn-sm btn-default">View</a>
                                            <a href="{{ route('admin.case-studies.edit', $caseStudy) }}" class="btn btn-sm btn-warning">Edit</a>
                                            @if ($caseStudy->status === 'published')
                                                <form method="POST" action="{{ route('admin.case-studies.unpublish', $caseStudy) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-secondary">Unpublish</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('admin.case-studies.publish', $caseStudy) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Publish</button>
                                                </form>
                                            @endif
                                            <form method="POST" action="{{ route('admin.case-studies.destroy', $caseStudy) }}"
                                                onsubmit="return confirm('Delete this case study? This cannot be undone.');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">No case studies yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $caseStudies->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
