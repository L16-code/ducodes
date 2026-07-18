@extends('admin.layouts.main')

@section('content')
    <a href="{{ route('admin.leads.index') }}" class="float-xl-end btn btn-default">Back to leads</a>
    <h1 class="page-header">Lead: {{ $lead->name }}</h1>

    <div class="row">
        <div class="col-xl-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Message</h4>
                </div>
                <div class="panel-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $lead->name }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8"><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></dd>
                        <dt class="col-sm-4">Phone</dt>
                        <dd class="col-sm-8"><a href="tel:{{ $lead->phone_number }}">{{ $lead->phone_number }}</a></dd>
                        <dt class="col-sm-4">Subject</dt>
                        <dd class="col-sm-8">{{ $lead->msg_subject }}</dd>
                        <dt class="col-sm-4">Received</dt>
                        <dd class="col-sm-8">{{ $lead->created_at->format('M d, Y g:i A') }}</dd>
                        <dt class="col-sm-4">Message</dt>
                        <dd class="col-sm-8" style="white-space: pre-wrap;">{{ $lead->message }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Status &amp; Notes</h4>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.leads.update', $lead) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                @foreach (\App\Models\Contact::STATUSES as $statusOption)
                                    <option value="{{ $statusOption }}" @selected($lead->status === $statusOption) class="text-capitalize">
                                        {{ ucfirst($statusOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="notes">Notes</label>
                            <textarea name="notes" id="notes" rows="6" class="form-control" placeholder="Internal notes about this lead...">{{ old('notes', $lead->notes) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
