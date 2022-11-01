@extends('layouts.backend')

{{-- @section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection --}}

<style>
    .event-card-button {
        padding: 0px;
        border: none;
        text-align: left;
    }
</style>

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
      <div class="flex-grow-1">
        <h1 class="h3 fw-bold mb-2">
          Dashboard
        </h1>
        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
          Welkom op de website van Lifestyledag, {{Auth::user()->name}}.
        </h2>
      </div>
      <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item">
            <a class="link-fx" href="javascript:void(0)">App</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            Dashboard
          </li>
        </ol>
      </nav>
    </div>
    <a class="btn-sm btn-alt-secondary" href="{{Route('activity.create')}}">Activteit aanmaken</a>
  </div>
</div>
<!-- END Hero -->

	 <!-- Page Content -->
   <div class="content content-boxed">
    <div class="row">
        @foreach($events as $event)
        <!-- Story -->
        @if ($event->frontpage == true)
        <div class="col-lg-4">
            <a class="block block-rounded block-link-pop overflow-hidden" href="{{ route('activity.index', ['event_id' => Crypt::encrypt($event->id)]) }}">
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


		</div>

		<!-- Footer -->
		<footer id="page-footer" class="bg-body-light">
			<div class="content py-3">
				<div class="row fs-sm">
					<div class="col-sm-6 order-sm-1 text-sm-start py-1 text-center">
						<a class="fw-semibold" target="_blank">Lifestyledag</a> &copy;
						<span data-toggle="year-copy"></span>
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
