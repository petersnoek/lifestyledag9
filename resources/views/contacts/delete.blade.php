@extends('layouts.backend')

@section('content')
    <div class="content">
        <div class="block block-rounded px-5 py-3">
            <div class="block-content block-content-full">
                <div>
                    <div class="block-rounded px-5 py-3 alert alert-danger">
                        <h1>Weet je zeker dat je de contactpersoon '{{$contact->displayName()}}' wilt verwijderen?</h1>
                        @if ($contact->user()->first() !== null)
                            @can(['user.block'])
                                <p>'Blokeer gekoppelde user' wil de user blokkeren en de contactpersoon permanent verwijderen</p>
                                <ul>
                                    <li>Deze gebruiker zal niet meer kunnen inloggen op dit account.</li>
                                    <li>Het email adress '{{$contact->user()->first()->email}}' kan niet gebruikt worden om een nieuw account te maken.</li>
                                    <li>Alle bijbehorende workshops worden niet meer weergeven.</li>
                                </ul>
                            @endcan
                        @endif
                        <p>'Verwijder contact' verwijderd de contactpersoon permanent.</p>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('contacts.destroy') }}" method="POST">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{$contact->id}}">

                            <button type="submit" value="1" name="submit" class="btn btn-danger" data-toggle="tooltip" title="Verwijder de contactpersoon">
                                verwijder contact
                            </button>
                        </form>
                        @if ($contact->user()->first() !== null)
                            @can(['user.block'])
                                <form action="{{ route('contact.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="contact_id" value="{{$contact->id}}">

                                    <button type="submit" value="2" name="submit" class="btn btn-danger" data-toggle="tooltip" title="Blokeer gekoppelde user en verwijder de contact">
                                        Blokeer gekoppelde user en verwijder contact
                                    </button>
                                </form>
                            @endcan
                        @endif
                        <a href="{{ route('contacts.index') }}" class="btn btn-info">Annuleer</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
