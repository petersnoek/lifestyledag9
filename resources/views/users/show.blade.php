@extends('layouts.backend')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Show user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Roles:
                @foreach($user->roles as $role)
                    @if ($user->roles->last() === $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                    @else
                        <span class="badge bg-primary">{{ $role->name }}</span>,
                    @endif
                @endforeach
            </div>

            {{-- <div>
                Username: {{ $user->username }}
            </div> --}}
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
