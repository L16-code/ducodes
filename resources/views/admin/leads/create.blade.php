@extends('admin.layouts.main')

@section('content')
    <a href="{{ route('admin.leads.index') }}" class="float-xl-end btn btn-default">Back to leads</a>
    <h1 class="page-header">Add Lead</h1>

    <div class="row">
        <div class="col-xl-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">New Lead</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.leads.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone_number">Phone</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="msg_subject">Subject</label>
                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" value="{{ old('msg_subject') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="message">Message / details</label>
                            <textarea name="message" id="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                @foreach ($statuses as $statusOption)
                                    <option value="{{ $statusOption }}" @selected(old('status', 'new') === $statusOption)>
                                        {{ ucfirst($statusOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="notes">Notes</label>
                            <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="e.g. how this lead came in">{{ old('notes') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create lead</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
