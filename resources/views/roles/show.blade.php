@extends('layouts.backend')

@section('content')
    <div class="bg-light p-4 rounded"><!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            {{ ucfirst($role->name) }} rol wijzigen
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0"></h2>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('roles.index') }}">Rollenbeheer</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{$role->name}}
                        </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        
        <div class="mt-4">
            @can(['roles.edit', 'roles.update'])
                @if (strtolower($role->name) != "admin")
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                @endif
            @endcan
            <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
        </div>
        <div class="block-content block-content-full block block-rounded">
            <h3>Permissies toewijzen</h3>
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                <thead>
                    <tr>
                        <th scope="col" width="20%">Naam</th>
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
