@extends('admin.layouts.main')

@section('content')
    <a href="{{ route('admin.services.create') }}" class="float-xl-end btn btn-primary">Add service page</a>
    <h1 class="page-header">Service pages</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All service pages ({{ $services->total() }})</h4>
                </div>
                <div class="panel-body">
                    <form method="GET" action="{{ route('admin.services.index') }}" class="row g-2 align-items-end mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="category">Filter by category</label>
                            <select name="category" id="category" class="form-select" onchange="this.form.submit()">
                                <option value="">All categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" @selected(request('category') === $category)>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if (request()->filled('category'))
                            <div class="col-md-2">
                                <a href="{{ route('admin.services.index') }}" class="btn btn-default">Clear filter</a>
                            </div>
                        @endif
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->category }}</td>
                                        <td><a href="{{ route('services.show', $service->slug) }}" target="_blank">/services/{{ $service->slug }}</a></td>
                                        <td>{{ $service->sort_order }}</td>
                                        <td>
                                            <span class="badge bg-{{ $service->is_active ? 'success' : 'secondary' }}">
                                                {{ $service->is_active ? 'Active' : 'Hidden' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">No service pages yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $services->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
