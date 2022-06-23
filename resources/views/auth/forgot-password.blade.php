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
        <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-light">
            <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <div class="text-center mb-5">
                        <!-- Main Section -->
                        <p class="mb-3">
                            <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                        </p>
                        <h1 class="fw-bold mb-2">
                            Wachtwoord vergeten
                        </h1>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Wachtwoord vergeten? Geen probleem. Laat ons uw e-mailadres weten en we sturen u een link voor het opnieuw instellen van uw wachtwoord waarmee u een nieuwe kunt kiezen.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row g-0 justify-content-center">
                                <div class="col-sm-8 col-xl-4">
                                    <!-- Email Address -->
                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="email" name="email" placeholder="E-mail">
                                    </div>

                                    <button type="submit" class="btn btn-lg btn-alt-primary">
                                            <i class="fa-regular fa-envelope"></i> Email Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection