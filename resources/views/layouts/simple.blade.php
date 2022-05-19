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

  <div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->
  </div>
  <!-- END Page Container -->

  <!-- OneUI Core JS -->
  <script src="{{ asset('js/oneui.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
