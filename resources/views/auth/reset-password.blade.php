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
        <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-light">
            <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                <div class="w-100">
                    <div class="text-center mb-5">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="row g-0 justify-content-center">
                            <div class="col-sm-8 col-xl-4">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email Address -->
                                    <p class="mb-3">
                            <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                        </p>
                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="email" name="email" placeholder="E-mail">
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password" name="password" placeholder="Wachtwoord">
                                </div>

                                    <!-- Confirm Password -->

                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password_confirmation" name="password_confirmation" placeholder="Wachtwoord">
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-button>
                                            {{ __('Reset Password') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection