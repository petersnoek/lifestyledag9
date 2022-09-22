@extends('layouts.backend')

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
          Welkom op de website van Lifestyledag, {{Auth::user()->name;}}.
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
  </div>
</div>
<!-- END Hero -->

	<!-- Page Content -->
	<div class="content content-boxed">
		<div class="row">

			<!-- Story -->
			@foreach ($activities as $activity)
				<div class="col-lg-4">
					<a class="block-rounded block-link-pop block overflow-hidden" href="/activity/{{ $activity->id }}">
						<img class="img-fluid" src="{{ asset('media/photos/photo2@2x.jpg') }}" alt="">
						<div class="block-content">
							<h4 class="mb-1">
								{{ $activity->name }}
							</h4>
							<p class="fs-sm fw-medium mb-2">
								{{ $activity->executed_by }}
							</p>
							<p class="fs-sm text-muted">
								{{ $activity->description }}
							</p>
							<p class="fs-sm fw-medium mb-2">
								@if ($event->has_rounds())
									@foreach ($event->eventrounds as $round)
										Ronde {{ $round->round }}:
										@foreach ($activityRound as $rounds)
											{{ $activity->availability_message($round->round, $rounds->max_participants) }}
											<br>
										@endforeach
									@endforeach
								@endif
							</p>

							{{-- @foreach ($activity->enlistments as $enlistments)
								<p class="fs-sm fw-medium mb-2">
									{{ $enlistments->round_id }}
								</p>
							@endforeach --}}

						</div>
					</a>
				</div>
				<!-- END Story -->
			@endforeach


		</div>

		<!-- Footer -->
		<footer id="page-footer" class="bg-body-light">
			<div class="content py-3">
				<div class="row fs-sm">
					<div class="col-sm-6 order-sm-2 text-sm-end py-1 text-center">
						Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
							href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
					</div>
					<div class="col-sm-6 order-sm-1 text-sm-start py-1 text-center">
						<a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.2</a> &copy;
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