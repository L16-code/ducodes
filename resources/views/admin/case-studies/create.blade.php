@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Add case study</h1>

    <div class="row">
        <div class="col-xl-9">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">New case study</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.case-studies.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.case-studies._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
