@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Add FAQ</h1>

    <div class="row">
        <div class="col-xl-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">New FAQ</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.faqs.store') }}">
                        @csrf
                        @include('admin.faqs._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
