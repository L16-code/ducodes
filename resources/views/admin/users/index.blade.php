@extends('admin.layouts.main')

@section('content')
    <h1 class="page-header">Users</h1>

    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Admin &amp; Staff Accounts</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->userType === 'admin' ? 'success' : 'secondary' }} text-capitalize">
                                            {{ $user->userType }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.users.update-role', $user) }}" class="d-flex gap-2">
                                            @csrf
                                            <select name="userType" class="form-select form-select-sm" style="width: auto;">
                                                <option value="user" @selected($user->userType === 'user')>User</option>
                                                <option value="admin" @selected($user->userType === 'admin')>Admin</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
