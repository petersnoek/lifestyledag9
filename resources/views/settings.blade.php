@extends('layouts.backend')

@section('content')
        <div class="bg-image" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
          <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
              <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
              </div>
              <h1 class="h2 text-white mb-0">Pas gegevens aan</h1>
              <h2 class="h4 fw-normal text-white-75">
              {{Auth::user()->name}}
              </h2>
              <a class="btn btn-alt-secondary" href="{{ route('dashboard') }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Terug naar dashboard
              </a>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-boxed">
          <!-- User Profile -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Gebruikers Profiel</h3>
            </div>
            <div class="block-content">
              <?php  $userId = Auth::id(); ?>
              <form action="{{ route('users.update2', [$userId]) }}" method="GET"> 
                @csrf

                @if (count($errors) > 0)
                  @foreach($errors as $error)
                      <div style="color: #841717; background-color: #f8d4d4; margin-bottom: 5px; padding: 5px; box-shadow: 0 0.125rem #f4bebe; border-radius: 5px">
                        {{$error[0]}}
                      </div>
                  @endforeach
                @endif

                <div class="row push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="name">Naam</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Vul je naam in..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="classCode">Klascode</label>
                      <input type="text" class="form-control" id="classCode" name="classCode" placeholder="Vul je klascode in..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Vul je email in..">
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">
                        Update gegevens
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END User Profile -->

          <!-- Change Password -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Verander Wachtwoord</h3>
            </div>
            <div class="block-content">
              <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
                <div class="row push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="one-profile-edit-password">Huidig Wachtwoord</label>
                      <input type="password" class="form-control" id="one-profile-edit-password" name="one-profile-edit-password">
                    </div>
                    <div class="row mb-4">
                      <div class="col-12">
                        <label class="form-label" for="one-profile-edit-password-new">Nieuw Wachtwoord</label>
                        <input type="password" class="form-control" id="one-profile-edit-password-new" name="one-profile-edit-password-new">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-12">
                        <label class="form-label" for="one-profile-edit-password-new-confirm">Bevestig Nieuw Wachtwoord</label>
                        <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" name="one-profile-edit-password-new-confirm">
                      </div>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">
                        Update wachtwoord
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END Connections -->
        </div>
        <!-- END Page Content -->
    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/oneui.app.min.js"></script>
  </body>
</html>
  <!-- END Page Content -->
@endsection
