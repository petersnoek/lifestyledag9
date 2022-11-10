@extends('layouts.backend')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>{{ ucfirst($role->name) }} Role</h1>
        <div class="mt-4">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
        </div>
        <div class="block-content block-content-full block block-rounded">
            <h3>Assigned permissions</h3>
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                <thead>
                    <tr>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rolePermissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
