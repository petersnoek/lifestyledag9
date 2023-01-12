@extends('layouts.backend')

@section('content')
        <div class="bg-image" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
          <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
              <div class="my-3">
                <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
              </div>
              <h1 class="h2 text-white mb-0">Pas gegevens aan</h1>

              <br>
          
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
                      <label class="form-label" for="firstname">Naam</label>
                      <input type="text" class="form-control" id="firstname" name="first_name" value="{{Auth::user()->first_name}}" placeholder="Naam">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="insertion">Tussenvoegsel</label>
                      <input type="text" class="form-control" id="insertion" name="insertion" value="{{Auth::user()->insertion}}" placeholder="Tussenvoegsel">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="lastname">Achternaam</label>
                      <input type="text" class="form-control" id="lastname" name="last_name" value="{{Auth::user()->last_name}}" placeholder="Achternaam">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="class_code">Klascode</label>
                      <input type="text" class="form-control" id="class_code" name="class_code" value="{{Auth::user()->class_code}}" placeholder="Vul je klascode in..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Vul je email in..">
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
