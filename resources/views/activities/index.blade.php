@extends('layouts.backend')

@section('content')
    <!-- Hero -->
        <!-- Page Header -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            @if(isset($event->name)) {{$event->name}} @else {{'Titel'}} @endif
                        </h1>
                        <small><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($event->starts_at)->format('d-m-Y H:i') }} - {{ Carbon\Carbon::parse($event->ends_at)->format('   H:i') }}</small><br>
                        <small><i class="fa fa-home"></i>@if(isset($event->location)) {{$event->location}} @else {{'Location'}} @endif</small><br>
                        <small>@if(isset($event->description)) {{$event->description}} @else {{'Description'}} @endif</small><br>
                        @if($event->has_rounds())
                            <small></small><br>
                            <h4>Rondes:</h4><br>
                        @foreach($event->eventrounds as $round)
                            <span class="badge bg-primary rounded-pill">{{ $round->round }}</span> {{ Carbon\Carbon::parse($round->start_time)->format('H:i') }}
                        @endforeach
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Inschrijvingen
                        </h1>
                        @if(Auth::check() && $event->registrations_possible())
                            @foreach(Auth::user()->enlistments_for_event($event->id) as $enlist)
                                <form action="{{ route('enlistment.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="enlistment_id" value="{{$enlist->id}}">
                                    <input type="hidden" name="event_id" value="{{$event->id}}">

                                    <small><span class="badge bg-primary rounded-pill"> {{ $enlist->eventrounds()->first()->round }}</span> {{ $enlist->activity->name }}
                                        <button type="submit" class="">
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </small>
                                </form><br>
                            @endforeach
                        @elseif (!$event->registrations_possible())
                            @foreach(Auth::user()->enlistments_for_event($event->id) as $enlist)
                                <small class="text-muted"><span class="badge rounded-pill bg-muted"> {{ $enlist->eventrounds()->first()->round }}</span> {{ $enlist->activity->name }}</small><br>
                            @endforeach
                            <br><br>
                            <b><small class="text-info">Registraties voor dit event zijn nog niet begonnen of al geëindigt.</small></b>
                        @else
                            <small>Om je te kunnen inschrijven voor activiteiten moet je eerst inloggen.</small>
                        @endif
                    </div>
                </div>
                {{-- <a class="btn-sm btn-alt-secondary" href="{{Route('activity.create')}}">Activteit aanmaken</a> --}}
            </div>
        </div>

        <div class="mt-2">
            @include('layouts.partials.errorMessages')
        </div>

        <div class="content">
            <div class="row" style="display: flex; display: -webkit-flex; flex-wrap: wrap;">

                <?php $number = 1; ?>
                @foreach ($event->activities as $activity)
                    <div class="col-lg-4">
                        <a class="block-rounded block-link-pop block overflow-hidden" href="#">
                        <div class="card text-center">
                            @can(['edit-any-activity'])
                            <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li>
                                    <form action="{{ route('activity.edit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                        <button type="submit" disabled class="">
                                            Edit <i class="si si-note"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                            </div>
                            @endcan

                            @can(['delete-any-activity'])
                            <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li>
                                    <form action="{{ route('activity.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                        <button type="delete" disabled class="">
                                            Delete <i class="si si-note"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                            </div>
                            @endcan

                            <img class="img-fluid" src="@if(isset($activity->image)) {{asset('storage/activityHeaders/'.$activity->image)}} @else {{asset('media/photos/photo2@2x.jpg')}} @endif" alt="kan afbeelding niet inladen.">
                            <div class="card-body">
                                <h4 class="mb-1 text-start">
                                    {{ $number++ . " " . $activity->name }}
                                </h4>
                                @if (isset($activity->executed_by) && ltrim($activity->executed_by, '&#64;') !== '')
                                    <p class="fs-sm fw-medium mb-2 text-start">
                                        &#64;{{ ltrim($activity->executed_by, '&#64;') }}
                                    </p>
                                @endif
                                <p class="fs-sm text-muted text-start">
                                    {{ $activity->description }}
                                </p>
                                @if ($event->has_rounds())
                                    @if ( Auth::user()->is_enlisted_for($activity->id) && $event->registrations_possible())
                                        <span class="text-center text-success">je bent ingeschreven voor deze activiteit</span>
                                    @elseif ($event->registrations_possible())
                                        @foreach ($event->eventrounds as $round)
                                            <form action="{{ route('enlistment.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                                <input type="hidden" name="activity_id" value="{{$activity->id}}">
                                                <input type="hidden" name="round_id" value="{{$round->id}}">

                                                <button type="submit" @if (!$activity->availability($round->id)) {{'disabled'}} @endif class="w-100">
                                                    Ronde {{ $round->round }}:
                                                    {{ $activity->availability_message($round->id) }}
                                                </button>
                                            </form>
                                        @endforeach
                                    @else
                                        <span class="text-center text-info">Registraties voor dit event zijn nog niet begonnen of al geëindigt.</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        </a>
                    </div>
                    <!-- END Story -->
                @endforeach
            </div>
        </div>
@endsection
