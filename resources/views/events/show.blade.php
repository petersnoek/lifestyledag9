@extends('layouts.backend')

@section('content')
    <!-- Hero -->
        <!-- Page Header -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between py-2">
                    <div class="col-7">
                        <h1 class="h3 fw-bold mb-2">
                            @if(isset($event->name)) {{$event->name}} @else {{'Titel'}} @endif
                        </h1>
                        <div>
                            <div>
                                <small><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($event->starts_at)->format('d-m-Y H:i') }} - {{ Carbon\Carbon::parse($event->ends_at)->format('   H:i') }}</small>
                            </div>
                            @if($event->location)
                            <div>
                                <small><i class="fa fa-location-dot"></i> {{$event->location}}</small>
                            </div>
                            @endif
                        </div>
                        @if(isset($event->description))
                        <div>
                            <small>{{$event->description}}</small>
                        </div>
                        @endif
                        @if($event->has_rounds())
                            <small></small><br>
                            <h4 style="margin-bottom: 0.5rem">Rondes:</h4>
                            <div>
                            @foreach($event->eventrounds as $round)
                                <span class="badge bg-primary rounded-pill">{{ $round->round }}</span> {{ Carbon\Carbon::parse($round->start_time)->format('H:i') }}{{-- when it's empty it'll fill it in with current time --}}
                            @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-3">
                        <h1 class="h3 fw-bold mb-2">
                            Inschrijvingen
                        </h1>
                        @if(Auth::check() && $event->registrations_possible())
                            <table class="table">
                            <thead class="visually-hidden">
                                <tr>
                                    <th scope="col" width=""></th>
                                    <th scope="col" width="90%"></th>
                                    <th scope="col" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->enlistments_for_event($event->id) as $enlist)
                                <tr>
                                <form action="{{ route('enlistment.destroy') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="enlistment_id" value="{{$enlist->id}}">
                                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    <td class="px-0"><span class="badge bg-primary rounded-pill"> {{ $enlist->eventrounds()->first()->round }}</span></td>
                                    <td class="pr-0"><small>{{ $enlist->activity->name }}</small></td>
                                    @can(['enlistment.destroy'])
                                    <td class="px-0">
                                        <button type="submit" class="btn btn-danger btn-sm p-0" style="width: 1.5rem; height: 1.5rem; text-align:center;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    @endcan
                                </form>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        @elseif (!$event->registrations_possible())
                            @foreach(Auth::user()->enlistments_for_event($event->id) as $enlist)
                                <small class="text-muted"><span class="badge rounded-pill bg-muted"> {{ $enlist->eventrounds()->first()->round }}</span> {{ $enlist->activity->name }}</small><br>
                            @endforeach
                            <br><br>
                            <b><small class="text-info">Registraties voor dit event zijn nog niet begonnen of al geëindigd.</small></b>
                        @else
                            <small>Om je te kunnen inschrijven voor activiteiten moet je eerst inloggen.</small>
                        @endif
                    </div>
                </div>
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
                            @can(['activity.update'])
                            <div class="card-header">
                                <ul class="nav nav-pills card-header-pills justify-content-end gap-2">
                                    @can(['edit-any-activity'])
                                    <li>
                                        <form action="{{ route('activity.edit') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                            <button class="btn btn-primary btn-sm" type="submit" disabled>
                                                Edit
                                            </button>
                                        </form>
                                    </li>
                                    @endcan
                                    @can(['delete-any-activity'])
                                    <li>
                                        <form action="{{ route('activity.destroy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="activity_id" value="{{$activity->id}}">
                                            <input type="hidden" name="event_id" value="{{$event->id}}">

                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Weet u zeker dat u deze activiteit wilt verwijderen? Waarschuwing alle ingschrijvingen worden mee verwijdert!')">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                            @endcan

                            <div style="overflow:hidden; height:11.75rem;" class="position-relative">
                                <img style="top: 50%; left: 50%; transform: translate(-50%, -50%); min-height: 11.75rem; min-width: 100%" class="w-100 position-absolute" src="@if(isset($activity->image)) {{asset('storage/activityHeaders/'.$activity->image)}} @else {{asset('media/photos/photo2@2x.jpg')}} @endif" alt="kan afbeelding niet inladen.">
                                {{-- image still stretches a bit cuz I can't not give it a width or height; this is like near impossible --}}
                            </div>
                            <div class="card-body">
                                <h4 class="mb-1 text-start">
                                    {{ $number++ . " " . $activity->name }}
                                </h4>
                                @if (isset($activity->executed_by) && ltrim($activity->executed_by, '&#64;') !== '')
                                    <p class="fs-sm fw-medium mb-2 text-start">
                                        &#64;{{ ltrim($activity->executed_by, '&#64;') }}
                                    </p>
                                @endif
                                <p class="fs-sm text-muted text-start @can(['enlistment.store']) mb-2 @else mb-0 @endcan">
                                    {{ $activity->description }}
                                </p>
                                @can(['enlistment.store'])
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

                                                    <button type="submit" @if (!$activity->availability($round->id)) {{'disabled'}} @endif class="w-100 btn-sm">
                                                        Ronde {{ $round->round }}:
                                                        {{ $activity->availability_message($round->id) }}
                                                    </button>
                                                </form>
                                            @endforeach
                                        @else
                                            <span class="text-center text-info">Registraties voor dit event zijn nog niet begonnen of al geëindigd.</span>
                                        @endif
                                    @endif
                                @endcan
                            </div>
                        </div>
                        </a>
                    </div>
                    <!-- END Story -->
                @endforeach
            </div>
        </div>

@endsection