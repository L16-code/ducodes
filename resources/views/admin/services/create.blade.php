@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Add service page</h1>

    <div class="row">
        <div class="col-xl-9">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">New service page</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.services.store') }}">
                        @csrf
                        @include('admin.services._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
