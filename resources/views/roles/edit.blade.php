@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Rol wijzigen
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('roles.index') }}">Rollenbeheer</a> 
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{$role->name}}
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Edit
                    </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    
        <div class="container mt-4">
            @include('layouts.partials.errorMessages')

            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('patch')
                @csrf
                <button type="submit" class="btn btn-primary">Wijzigingen opslaan</button>
                <a href="{{ route('roles.index') }}" class="btn btn-default">Terug</a>
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input value="{{ $role->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Naam" required>
                </div>

                <label for="permissions" class="form-label">Permissies toewijzen</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"></th>
                        <th scope="col" width="20%">Naam</th>
                        <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox"
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'
                                {{ in_array($permission->name, $rolePermissions)
                                    ? 'checked'
                                    : '' }}>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Wijzigingen opslaan</button>
                <a href="{{ route('roles.index') }}" class="btn btn-default">Terug</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
