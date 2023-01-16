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
  @stack('js_scripts')
</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">

  <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">

        <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">

          <!-- Side Header -->
          <div class="content-header">

              <!-- Side Header -->
              <div class="side-header side-content bg-white-op">
                  <!-- Logo -->
                  <a class="fw-semibold text-dual" href="{{ route('dashboard') }}">
                      <span class="smini-visible"><img src="/favicons/carrot-16.png"></span>
                      <span class="smini-hide fs-5 tracking-wider"><img src="/favicons/carrot-16.png" style="display:inline-block; margin-top:-3px; margin-right: 5px; vertical-align: middle">{{ config('app.name', 'Laravel') }}</span>
                  </a>
                  <!-- END Logo -->

              </div>
              <!-- END Side Header -->

              <div>
                  <!-- Close Sidebar, Visible only on mobile screens -->
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                      <i class="fa fa-fw fa-times"></i>
                  </a>
                  <!-- END Close Sidebar -->
              </div>
          </div>

        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                @can(['dashboard'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                @endcan

                @can(['contacts.index'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('contacts.index') ? ' active' : '' }}" href="{{ route('contacts.index') }}">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Contactpersonen</span>
                        </a>
                    </li>
                @endcan

                @can(['roles.index'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('roles.index') ? ' active' : '' }}" href="{{ route('roles.index') }}">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Rollenbeheer</span>
                        </a>
                    </li>
                @endcan

                @can(['permissions.index'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('permissions.index') ? ' active' : '' }}" href="{{ route('permissions.index') }}">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Permissies</span>
                        </a>
                    </li>
                @endcan

                @can(['users.index'])
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('users.index') ? ' active' : '' }}" href="{{ route('users.index') }}">
                            <i class="nav-main-link-icon si si-cursor"></i>
                            <span class="nav-main-link-name">Gebruikers</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Toggle Mini Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-ellipsis-v"></i>
          </button>
          <!-- END Toggle Mini Sidebar -->

          <!-- Open Search Section (visible on smaller screens) -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout" data-action="header_search_on">
            <i class="fa fa-fw fa-search"></i>
          </button>
          <!-- END Open Search Section -->

          
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
              <span class="d-none d-sm-inline-block ms-2">{{Auth::user()->first_name}}</span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                <p class="mt-2 mb-0 fw-medium">{{Auth::user()->first_name}}</p>
                <p class="mb-0 text-muted fs-sm fw-medium">{{Auth::user()->getRoleNames()[0]}}</p>
              </div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('settings') }}">
                  <span class="fs-sm fw-medium">Instellingen</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-flex align-items-center justify-content-between">
                  <span class="fs-sm fw-medium">Uitloggen</span>
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

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <form class="w-100" action="/dashboard" method="POST">
            @csrf
            <div class="input-group">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

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

  <!-- OneUI Core JS -->
  <script src="{{ mix('js/oneui.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
