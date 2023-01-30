@extends((Auth::user()->hasRole('geblokkeerd')) ? 'layouts.blocked' : 'layouts.backend')

@section('content')
    <!-- Hero -->
    @if(Auth::user()->hasRole('geblokkeerd'))
        <div class="d-flex align-items-center justify-content-center">
            <div style="margin-top: 15rem; margin-left: -240px">
                <div class="flex-grow-1 block-rounded px-5 py-3 alert alert-danger">
                    <h1 class="h3 fw-bold mb-2">Geblokkeerd</h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        {{Auth::user()->first_name}}, je bent geblokkeerd door een beheerder van de Lifestyledag.
                        <br>
                        Neem contact op met een beheerder voor eventuele opheffing.
                    </h2>
                </div>
            </div>
        </div>
    @else
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                        Dashboard
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welkom op de website van Lifestyledag, {{Auth::user()->first_name}}.
                        </h2>
                    </div>
                </div>
                @can(['event.create'])
                    <a class="btn btn-sm btn-alt-primary" href="{{Route('event.create')}}">Evenement aanmaken</a>
                @endcan
                @can(['activity.create'])
                    <a class="btn btn-sm btn-alt-primary" href="{{Route('activity.create')}}">Activiteit aanmaken</a>
                @endcan
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content content-boxed">
            <div class="mt-2">
                @include('layouts.partials.messages')
                @include('layouts.partials.errorMessages')
            </div>
            <div class="row">
                @foreach($events as $event)
                <!-- Story -->
                <div class="col-lg-4">
                    <a class="block block-rounded block-link-pop overflow-hidden" href="{{ route('event.show', ['event_id' => Crypt::encrypt($event->id)]) }}">
                        <img class="img-fluid" src="@if(isset($event->image)) {{asset('storage/eventHeaders/'.$event->image)}} @else {{asset('media/photos/photo2@2x.jpg')}} @endif" alt="kan afbeelding niet inladen.">
                        <div class="block-content">
                            <h4 class="mb-1">
                                {{ $event->name }}
                            </h4>
                            <p class="fs-sm fw-medium mb-2">
                                {{$event->startAndEndDate()}}
                            </p>
                            <p class="fs-sm text-muted">
                                {{ $event->description }}
                            </p>
                        </div>
                    </a>
                </div>
                <!-- END Story -->
                @endforeach
            </div>
        </div>
        <!-- END Page Content -->
        @if (count($workshops) > 0)
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h1 class="h3 fw-bold mb-2">Mijn workshops</h1>
                        </div>
                    </div>
                    @can(['activity.create'])
                        <a class="btn btn-sm btn-alt-primary" href="{{Route('activity.create')}}">Activiteit aanmaken</a>
                    @endcan
                </div>
            </div>

            <!-- Page Content -->
            <div class="content">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                        <table class="table table-bordered table-striped js-dataTable-full">
                            <thead>
                            <tr>
                                <th>Evenement</th>
                                <th>Activiteit</th>
                                <th>Gewijzigd</th>
                                <th class="text-center" style="width: 5%;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($workshops as $activity)
                                <tr>
                                    <td class="text-left">{{ $activity->event->name }}</td>
                                    <td class="text-left">{{ $activity->name }}</td>
                                    <td class="text-left">{{ $activity->updatedAtDate() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            @if (!$activity->event->after_event_registration())
                                                @can(['activity.edit', 'activity.update'])
                                                <a class="btn btn-xs btn-primary" href="{{ route('activity.edit', ['activity_id' => Crypt::encrypt($activity->id)]) }}" data-toggle="tooltip" title="Bewerk activiteit">Edit</a>
                                                @endcan
                                                @can(['activity.destroy'])
                                                <form action="{{ route('activity.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                                    <button type="submit" disabled class="btn btn-xs btn-danger" data-toggle="tooltip" title="Verwijder activiteit">Delete</button>
                                                </form>
                                                @endcan
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        @endif
    @endif
@endsection
