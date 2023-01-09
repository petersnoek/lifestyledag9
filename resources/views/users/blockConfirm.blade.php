@extends('layouts.backend')

@section('content')
    <div class="content">
        <div class="block block-rounded px-5 py-3">
            <div class="block-content block-content-full">
                <div>
                    <div class="block-rounded px-5 py-3 alert alert-danger">
                        <h1>Weet je zeker dat je '{{$user->name}}' wilt blokeren?</h1>
                        <ul>
                            <li>Deze gebruiker zal niet meer kunnen inloggen op dit account</li>
                            <li>Het email adress '{{$user->email}}' kan niet gebruikt worden om een nieuw account te maken</li>
                            <li>Alle bijbehorende inschrijvingen worden verwijderd</li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('users.block', $user->id) }}" class="btn btn-warning">Blokeer</a>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Annuleer</a>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
