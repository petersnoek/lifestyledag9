@extends('layouts.simple')

@section('content')
@push('js_scripts')
    <script>
        var count = 0;

        // als email pop up 1x is weergeven verwijder dan de pattern met @mydavinci.nl
        function mailError() {
            count += 1;
            console.log(count);
            if(count == 2){
                console.log(count);
                document.getElementById('email').pattern ='[a-z0-9.%+-]+@[a-z0-9.-]+.[a-z]{2,4}$';
            }
        }
    </script>
@endpush
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
                <div class="p-3 w-100 d-lg-none text-center">
                    <a class="link-fx fw-semibold fs-3 text-dark" href="/">
                        Lifestyledag
                    </a>
                </div>
                <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                    <div class="w-100">
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h1 class="fw-bold mb-2">
                                Maak een nieuw account
                            </h1>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <div class="row g-0 justify-content-center">
                            <div class="mt-2">
                                {{-- @include('layouts.partials.errorMessages') --}}
                            </div>
                            <div class="col-sm-8 col-xl-4">
                                <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="first_name" value="{{ old('first_name')}}" name="first_name" placeholder="Voornaam *" required>
                                    </div>
                                    @if($errors->has('first_name'))
                                        <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="insertion" value="{{ old('insertion')}}" name="insertion" placeholder="Tussenvoegsel">
                                    </div>
                                    @if($errors->has('insertion'))
                                        <div class="alert alert-danger">{{ $errors->first('insertion') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="last_name" value="{{ old('last_name')}}" name="last_name" placeholder="Achternaam *" required>
                                    </div>
                                    @if($errors->has('last_name'))
                                        <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="email" class="form-control form-control-lg form-control-alt py-3" id="email" value="{{ old('email')}}" name="email" title="Gebruik je studenten email als je deze hebt. (bijv. '12345678@mydavinci.nl')" pattern="^[a-zA-Z0-9]+@mydavinci\.nl$"   placeholder="Email: bijv. '12345678@mydavinci.nl' *" required>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="class_code" value="{{ old('class_code')}}" name="class_code" placeholder="Klascode: bijv. 'MBIAO20A5' *" required>
                                    </div>
                                    @if($errors->has('class_code'))
                                        <div class="alert alert-danger">{{ $errors->first('class_code') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password" name="password" placeholder="Wachtwoord *" required>
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-lg form-control-alt py-3" id="password_confirmation" name="password_confirmation" placeholder="Bevestig wachtwoord *" required>
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                                    @endif

                                    <div class="mb-4">
                                        <div class="d-md-flex align-items-md-center justify-content-md-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms" required>
                                                <label class="form-check-label" for="signup-terms">Ik ga akkoord met de voorwaarden</label>
                                            </div>
                                            <div class="py-2">
                                                <a class="fs-sm fw-medium" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-signup-terms">Bekijk de voorwaarden</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" onclick="mailError();" id="registerBtn" class="btn btn-lg btn-alt-success">Registreren</button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign Up Form -->
                    </div>
                </div>

            </div>
            <!-- END Main Section -->
        </div>

        <!-- Terms Modal -->
        <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Algemene voorwaarden</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Page Content -->
@endsection


@section('js_after')
    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="js/lib/jquery.min.js"></s>

    <!-- Page JS Plugins -->
    <script src="js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="js/pages/op_auth_signin.min.js"></script>
@endsection
