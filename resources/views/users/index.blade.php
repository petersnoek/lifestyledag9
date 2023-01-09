@extends('layouts.backend')

@section('content')

    <div class="bg-light p-4 rounded">
        <h1>Users</h1>
        <div class="lead">
            Manage your users here.
            {{-- <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new user</a> --}}
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="16%">Name</th>
                <th scope="col" width="20%">Email</th>
                <th scope="col" width="10%">Role</th>
                <th scope="col" width="1%" colspan="1"></th>
                <th scope="col" width="1%" colspan="1"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role) {{-- waarom is dit een loop? --}}
                                <span style="background-color: {{$role->color}}" class="badge">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($user->roles[0]->name != 'geblokeerd')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm disabled">Edit</a>
                            @endif
                        </td>
                        <td>
                            @if($user->roles[0]->name == 'student')
                                <a href="{{ route('users.blockConfirm', $user->id) }}" class="btn btn-danger btn-sm">Block</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>

    </div>
@endsection
