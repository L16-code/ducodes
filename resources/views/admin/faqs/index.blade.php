@extends('admin.layouts.main')

@section('content')
    <a href="{{ route('admin.faqs.create') }}" class="float-xl-end btn btn-primary">Add FAQ</a>
    <h1 class="page-header">FAQs</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All FAQs</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Question</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->service_slug ? ($services[$faq->service_slug]['title'] ?? $faq->service_slug) : 'General' }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->sort_order }}</td>
                                    <td>
                                        <span class="badge bg-{{ $faq->is_active ? 'success' : 'secondary' }}">
                                            {{ $faq->is_active ? 'Active' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No FAQs yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $faqs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
