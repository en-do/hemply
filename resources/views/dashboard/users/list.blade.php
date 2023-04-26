@extends('layouts.dashboard')

@section('content')

<section>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="button mb-4 text-end">
        <a href="{{ route('dashboard.user.add') }}" class="btn btn-primary">Додати користувача</a>
    </div>

    <div class="card">
        <div class="table-responsive">

            <table class="table mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Posts</th>
                    <th>Joined date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                <div>{{ $user->first_name }}</div>
                                <div class="fw-bold">{{ $user->email }}</div>
                            </td>
                            <td>
                                {{ $user->role->title }}
                            </td>
                            <td>
                                <div class="badge bg-primary">{{ $user->posts->count() }}</div>
                            </td>
                            <td>
                                {{ $user->created_at }}
                            </td>
                            <td align="right">
                                <a href="{{ route('dashboard.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" align="center">Users not found</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection
