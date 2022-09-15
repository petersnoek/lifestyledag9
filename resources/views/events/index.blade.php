@extends('layouts.simple')

@section('content')
    <!-- Hero Content -->
    <div class="bg-primary-dark">
        <div class="content content-full text-center pt-7 pb-6">
            <h1 class="h2 text-white mb-2">
                The latest stories only for you.
            </h1>
            <h2 class="h4 fw-normal text-white-75 mb-0">
                Feel free to explore and read.
            </h2>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row">

            @foreach($events as $event)
            <!-- Story -->
            @if ($event->frontpage == true)
            <div class="col-lg-4">
                <a class="block block-rounded block-link-pop overflow-hidden" href="{{ route('event.show', [$event->id]) }}">
                    <img class="img-fluid" src="{{ asset('media/photos/photo2@2x.jpg')}}" alt="">
                    <div class="block-content">
                        <h4 class="mb-1">
                            {{ $event->name }}
                        </h4>
                        <p class="fs-sm fw-medium mb-2">
                            {{ $event->starts_at  }} - {{ $event->starts_at  }}
                        </p>
                        <p class="fs-sm text-muted">
                            {{ $event->description }}
                        </p>
                    </div>
                </a>
            </div>
            @endif
            <!-- END Story -->
            @endforeach

        </div>

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.2</a> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
@endsection

@section('js_after')
    <script src="{{ asset('js/oneui.app.js') }}"></script>

    <!-- jQuery (required for jQuery Countdown plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-countdown/jquery.countdown.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/op_coming_soon.min.js') }}"></script>
@endsection
