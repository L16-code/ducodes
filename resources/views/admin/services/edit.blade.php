@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Edit service page</h1>

    <div class="row">
        <div class="col-xl-9">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $service->title }}</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.services.update', $service) }}">
                        @csrf
                        @include('admin.services._form')
                    </form>

                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="mt-3"
                        onsubmit="return confirm('Delete this service page? This cannot be undone.');">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete service page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
