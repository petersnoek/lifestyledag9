@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Contactpersoon wijzigen
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('contacts.index') }}">Contactpersonen</a>
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

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded px-5 py-3">
            <div class="block-content block-content-full">
                <div>
                    <form id="contacts-create-form" class="d-flex justify-content-evenly gap-3" action="{{ route('contacts.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="@if(old('id') === null){{$contact->id}}@else{{old('id')}}@endif"/>

                        <div class="col-sm-6 col-xl-6">
                            <div class="mb-4">
                                <label class="form-check-label">Voornaam *</label>
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('first_name')) {{'is-invalid'}} @endif" name="first_name" placeholder="Voornaam" value="@if(old('first_name') === null){{$contact->first_name}}@else{{old('first_name')}}@endif" maxlength="255" required>
                                @if ($errors->has('first_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-check-label">Tussenvoegsel</label>
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('insertion')) {{'is-invalid'}} @endif" name="insertion" placeholder="Tussenvoegsel" value="@if(old('insertion') === null){{$contact->insertion}}@else{{old('insertion')}}@endif" maxlength="255">
                                @if ($errors->has('insertion'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('insertion') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-check-label">Achternaam *</label>
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('last_name')) {{'is-invalid'}} @endif" name="last_name" placeholder="Achternaam"  value="@if(old('last_name') === null){{$contact->last_name}}@else{{old('last_name')}}@endif" maxlength="255" required>
                                @if ($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-check form-switch">
                                <input type="hidden" name="on_mailinglist" value="0"/>
                                <input type="checkbox" class="form-check-input @if ($errors->has('on_mailinglist')) {{'is-invalid'}} @endif" name="on_mailinglist" @if((old('on_mailinglist') !== null && old('on_mailinglist')) || (old('on_mailinglist') === null && isset($contact->on_mailinglist) && $contact->on_mailinglist)){{"checked"}}@endif value="1">
                                <label class="form-check-label">Op de mailinglijst.</label>
                                @if ($errors->has('on_mailinglist'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('on_mailinglist') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-6">
                            <div class="mb-4">
                                <label class="form-check-label">Organisatie *</label>
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('organisation')) {{'is-invalid'}} @endif" name="organisation" placeholder="Organisatie"  value="@if(old('organisation') === null){{$contact->organisation}}@else{{old('organisation')}}@endif" maxlength="255" required>
                                @if ($errors->has('organisation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('organisation') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-check-label">Email *</label>
                                <input type="email" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('email')) {{'is-invalid'}} @endif" name="email" placeholder="Email" value="@if(old('email') === null){{$contact->email}}@else{{old('email')}}@endif" maxlength="255" required>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-check-label">Telefoonnummer</label>
                                <input type="tel" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('phonenumber')) {{'is-invalid'}} @endif" name="phonenumber" placeholder="06-12345678" title="A valid phone number must include 2 digits, one hyphen (-) and 8 more digits" value="@if(old('phonenumber') === null){{$contact->phonenumber}}@else{{old('phonenumber')}}@endif" maxlength="20">

                                @if ($errors->has('phonenumber'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phonenumber') }}
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                    Wijzig contactpersoon
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
