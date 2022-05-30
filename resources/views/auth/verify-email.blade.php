@extends('layouts.simple')

@section('content')
<!-- Page Content -->
<div class="bg-image" style="background-image: url('media/photos/photo14@2x.jpg');">
    <div class="row g-0 bg-primary-dark-op">
        <!-- Meta Info Section -->
        <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
            <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <a class="link-fx fw-semibold fs-2 text-white" href="/">
                        Lifestyledag
                    </a>
                    <p class="text-white-75 me-xl-8 mt-2">
                        Welkom bij Da Vinci College! Je vind hier alles over de lifestyledag.
                    </p>
                </div>
            </div>
        </div>
        <!-- END Meta Info Section -->

        <!-- Main Section -->
        <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-light">
            <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <div class="text-center mb-5">
                        <p class="mb-3">
                            <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                        </p>
                        <h1 class="fw-bold mb-2">
                            E-mail verifiëren
                        </h1>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Bedankt voor het aanmelden! Voordat u begint, kunt u uw e-mailadres verifiëren door op de link te klikken die we u zojuist hebben gemaild? Als je de e-mail niet hebt ontvangen, sturen we je graag een andere.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Er is een nieuwe verificatielink verzonden naar het e-mailadres dat u tijdens de registratie heeft opgegeven.') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                    Verificatie e-mail opnieuw verzenden
                                </button>
                            </div>
                        </form>
                        <br>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-alt-primary">
                                <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Log out
                            </button>
                        </form>

                    </div>
                </div>
                <!-- END Main Section -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection