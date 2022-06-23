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
              Welkom bij Da Vinci College! U kunt zich hier aanmelden voor de Lifestyledag.
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
  <p class="mb-3">
    <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
  </p>
  <h1 class="fw-bold mb-2">
    Aanmelden
  </h1>
</div>
<!-- END Header -->

<!-- Sign In Form -->
<!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
<!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
<div class="row g-0 justify-content-center">
  <div class="col-sm-8 col-xl-4">
    <form action="{{ route('aanmelden.end') }}" method="POST">
      
      @csrf

      <div class="mb-4">
        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="activiteit" name="activiteit" placeholder="Activiteit">
      </div>

      <div class="mb-4">
        <textarea type="text" class="form-control form-control-lg form-control-alt py-3" id="beschrijving" name="beschrijving" placeholder="Beschrijving"></textarea>
      </div>

      <div class="mb-4">
        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="ronde" name="ronde" placeholder="Aantal rondes">
      </div>

      <div class="mb-4">
        <input type="text" class="form-control form-control-lg form-control-alt py-3" id="capaciteit" name="capaciteit" placeholder="Max aantal studenten">
      </div>

      <button type="submit" class="btn btn-lg btn-alt-primary" id="sendInvite" onclick="event.preventDefault(); this.form.submit();">
        <i></i> Aanmelding versturen
      </button>

    </form>
    </div>
  </div>
</div>
@endsection
