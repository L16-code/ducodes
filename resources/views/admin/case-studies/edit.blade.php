@extends('admin.layouts.main')

@section('content')
    <a href="{{ URL::signedRoute('case-studies.show', ['slug' => $caseStudy->slug]) }}" target="_blank" class="float-xl-end btn btn-default">Preview</a>
    <h1 class="page-header">Edit case study</h1>

    <div class="row">
        <div class="col-xl-9">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $caseStudy->title }}</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.case-studies.update', $caseStudy) }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.case-studies._form')
                    </form>

                    <form method="POST" action="{{ route('admin.case-studies.destroy', $caseStudy) }}" class="mt-3"
                        onsubmit="return confirm('Delete this case study? This cannot be undone.');">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete case study</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
