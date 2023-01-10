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
                    {{-- <form action="{{ route('users.block', $user->id) }}" method="post" class="mt-4">
                        <button type="submit" class="btn btn-warning">Blokeer</button>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Annuleer</a>
                    </form> --}}
                    <form action="{{ route('users.block') }}" method="post" class="mt-4">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-warning">Blokeer</button>
                        <a href="{{ route('users.index') }}" class="btn btn-info">Annuleer</a>
                    </form>
                </div>
            </div>
            
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
