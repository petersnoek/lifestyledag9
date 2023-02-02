@extends('layouts.backend')

@section('content')
    <div class="bg-light p-4 rounded">
        <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Rol toevoegen
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
                        Create
                    </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Naam" required>
                </div>

                <label for="permissions" class="form-label">Permissies toewijzen</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="20%">Naam</th>
                        <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox"
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Gebruiker opslaanr</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Terug</a>
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
