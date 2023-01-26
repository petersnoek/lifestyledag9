@extends('layouts.backend')

@section('content')
    <div class="bg-light p-4 rounded">
         <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Gebruiker wijzigen
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('users.index') }}">Gebruikers</a> 
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{$user->first_name}}
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

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input value="{{ $user->first_name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Naam" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <select class="form-control"
                        name="role" required>
                        <option value="">Selecteer een rol</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole)
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update gebruiker</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Annuleer</button>
            </form>
        </div>

    </div>
@endsection
