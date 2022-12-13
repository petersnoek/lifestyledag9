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
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Lifestyledag</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Contactpersonen
                        </li>
                    </ol>
                </nav>
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
                        <button type="submit" class="btn btn-primary">Maak users aan voor geselecteerde contacten.</button>
                    </h3>
                </div>

                {{-- padding: 1.25rem 1.25rem 1px; --}}
                <div class="block-content block-content-full table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                        <thead>
                            <th scope="col" width="1%"></th>
                            {{-- <th scope="col" width="1%"><input type="checkbox" name="all_contacts"></th> --}}
                            <th>Organisatie</th>
                            <th>Roepnaam</th>
                            <th>Tussenvoegsel</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Mobiel</th>
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
                                <td class="">{{ $contact->organisation }}</td>
                                <td class="">{{ $contact->firstname }}</td>
                                <td class="">{{ $contact->surname }}</td>
                                <td class="">{{ $contact->lastname }}</td>
                                <td class="">{{ $contact->email }}</td>
                                <td style="width: 20%">{{ $contact->mobiel }}</td>
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
