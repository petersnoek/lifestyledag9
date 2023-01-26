@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Contactpersonen
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0"></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>

            <div class="mt-2">
                @include('layouts.partials.errorMessages')
            </div>

            <form method="POST" action="{{ route('contacts.generate-users') }}">
                @method('patch')
                @csrf

                <div class="block-header block-header-default">
                    <h3 class="mb-0">
                        {{-- Dynamic Table <small>Export Buttons</small> --}}
                        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Maak contactpersoon</a>
                        <button type="submit" class="btn btn-primary">Maak workshophouder</button>
                    </h3>
                </div>

                <div class="block-content block-content-full table-responsive px-3 py-3">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm mb-0">
                        <thead>
                            <th scope="col" width="1%"></th>
                            {{-- <th scope="col" width="1%"><input type="checkbox" name="all_contacts"></th> --}}
                            <th>Organisatie</th>
                            <th>Roepnaam</th>
                            <th>Tussenvoegsel</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Mobiel</th>
                            <th>Gebruiker</th>
                            @can(['contacts.edit'])
                                <th>Actie</th>
                            @endcan
                        </thead>

                        @foreach($contacts as $contact)
                            <tr>
                                <td>
                                    <input type="checkbox"
                                    name="contacts[{{ $contact->id }}]"
                                    value="{{ $contact->id }}"
                                    {{ in_array($contact->name, $selectedContacts)
                                        ? 'checked'
                                        : '' }}>
                                </td>
                                <td>{{ $contact->organisation }}</td>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->insertion }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->mobiel }}</td>
                                <td>
                                    <input type="checkbox" disabled @if($contact->user()->first() !== null){{"checked"}}@endif>
                                </td>
                                @can(['contacts.edit'])
                                    <td><a href="{{ route('contacts.edit', ['id' => Crypt::encrypt($contact->id)]) }}" class="btn btn-primary">Edit</a></td>
                                @endcan
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
