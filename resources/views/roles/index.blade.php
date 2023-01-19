@extends('layouts.backend')

@section('content')

    <div class="bg-light p-4 rounded">
        <h1>Rollen</h1>
        <div class="lead">
            Beheer hier de rollen.
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mb-2">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Rol toevoegen</a>
        </div>
        <div class="block-content block-content-full block block-rounded">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th width="3%" colspan="3">Actie</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                      
                        <td>{{ $role->name }}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a></td>
                        @if (strtolower($role->name) != "admin")
                            <td><a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
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
