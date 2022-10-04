@extends('layouts.simple')

@section('content')
	<!-- Hero Content -->
	<div class="bg-primary-dark">
		<div class="content content-full pt-7 pb-6 text-center text-white">
			<h1 class="h2 mb-2">
				{{ $event->name }}<br>
			</h1>
			<small><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($event->starts_at)->format('d-m-Y H:i') }} -
				{{ Carbon\Carbon::parse($event->ends_at)->format('   H:i') }}</small><br>
			<small><i class="fa fa-home"></i> {{ $event->location }}</small><br>
			<small>{!! $event->description !!}</small><br>
			@if ($event->has_rounds())
				<small></small><br>
				<h4>Rondes:</h4><br>
				@foreach ($event->eventrounds as $round)
					<span class="badge badge-primary">{{ $round->round }}</span>

					{{ Carbon\Carbon::parse($round->start_time)->format('H:i') }}
				@endforeach
			@endif

		</div>
	</div>
	<!-- END Hero Content -->

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
					<div class="col-sm-6 order-sm-1 text-sm-start py-1 text-center">
						<a class="fw-semibold"  target="_blank">Lifestyledag</a> &copy;
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
