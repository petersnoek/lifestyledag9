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
              <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                    </p>
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="one-profile-edit-name">Naam</label>
                      <input type="text" class="form-control" id="one-profile-edit-name" name="one-profile-edit-name" placeholder="Vul je naam in.." value="">
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-alt-primary">
                        Update
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
                        Update
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
