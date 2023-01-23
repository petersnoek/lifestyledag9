<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Welkom bij Da Vinci College! Hier vind je alles over de lifestyledag.">
    <meta name="author" content="Peter Snoek">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="/favicons/carrot-16.png">
    <link rel="icon" type="image/png" href="/favicons/carrot-16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/favicons/carrot-32.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="16x16" href="/favicons/carrot-16.png">
    <link rel="apple-touch-icon" sizes="32x32" href="/favicons/carrot-32.png">

  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
    <!-- Right Section -->
    <div class="d-flex align-items-center">
      <!-- User Dropdown -->
      <div class="dropdown d-inline-block ms-2">
        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
          <span class="d-none d-sm-inline-block ms-2">{{Auth::user()->name}}</span>
          <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
          <div class="p-3 text-center bg-body-light border-bottom rounded-top">
            <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
            <p class="mt-2 mb-0 fw-medium">{{Auth::user()->name}}</p>
            <p class="mb-0 text-muted fs-sm fw-medium">{{Auth::user()->getRoleNames()[0]}}</p>
          </div>
          <div role="separator" class="dropdown-divider m-0"></div>
          <div class="p-2">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex align-items-center justify-content-between">
              <span class="fs-sm fw-medium">Log Out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
      <!-- END User Dropdown -->

      <!-- Toggle Side Overlay -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <!-- END Toggle Side Overlay -->
    </div>
    <!-- END Right Section -->
  </div>
  <!-- END Header Content -->

  <!-- Footer -->
  <footer id="page-footer" class="bg-body-light">
    <div class="content py-3">
      <div class="row fs-sm">
        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
          <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">Lifestyledag</a> &copy; <span data-toggle="year-copy"></span>
        </div>
      </div>
    </div>
  </footer>
  <!-- END Footer -->
</div>
<!-- END Page Container -->

</body>

</html>
