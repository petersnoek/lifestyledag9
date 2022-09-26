@extends('layouts.backend')

@section('content')

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <div class="block-content block-content-full block block-rounded">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Name</th>
                    <th width="3%" colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a></td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="DELETE" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection
