@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Edit FAQ</h1>

    <div class="row">
        <div class="col-xl-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Edit FAQ</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                        @csrf
                        @include('admin.faqs._form')
                    </form>

                    <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="mt-3"
                        onsubmit="return confirm('Delete this FAQ? This cannot be undone.');">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
