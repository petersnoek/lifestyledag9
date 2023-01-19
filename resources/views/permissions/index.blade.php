@extends('layouts.backend')

@section('content')

    <div class="bg-light p-4 rounded">
        <h2>Permissies</h2>
        <div class="lead">
           Beheer hier de permissies
            @can(['permissions.create', 'permissions.store'])
                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
            @endcan
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <div class="block-content block-content-full block block-rounded">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                <thead>
                <tr>
                    <th scope="col" width="15%">Naam</th>
                    <th scope="col">Guard</th>
                    @canany(['permissions.update', 'permissions.destroy'])
                        <th scope="col" colspan="2"></th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            @can(['permissions.edit', 'permissions.update'])
                                <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                            @endcan
                            @can(['permissions.destroy'])
                                <td>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
