@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                </h1>
                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                Welkom op de website van Lifestyledag, {{Auth::user()->first_name}}.
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
        @can(['activity.create'])
            <a class="btn-sm btn-alt-secondary" href="{{Route('activity.create')}}">Activiteit aanmaken</a>
        @endcan
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content content-boxed">
    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>
    <div class="row">
        @foreach($events as $event)
        <!-- Story -->
        <div class="col-lg-4">
            <a class="block block-rounded block-link-pop overflow-hidden" href="{{ route('event.show', ['event_id' => Crypt::encrypt($event->id)]) }}">
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
        <!-- END Story -->
        @endforeach
    </div>
</div>
@if (count($workshops) > 0)
    <div class="bg-body-light">
        <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">Mijn workshops</h1>
            </div>
        </div>
        @can(['activity.create'])
            <a class="btn-sm btn-alt-secondary" href="{{Route('activity.create')}}">Activteit aanmaken</a>
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
                        <th class="text-center">#</th>
                        {{-- <th>Afbeelding</th> --}}
                        <th>Evenement</th>
                        <th>Activiteit</th>
                        <th>Gewijzigd</th>
                        <th class="text-center" style="width: 5%;">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($workshops as $activity)
                        <tr>
                            <td class="text-center">{{ $activity->id }}</td>
                            {{-- <td class="text-left"><img src="/{{ $activity->banner_image }}" style="height:20px;"></td> --}}
                            <td class="text-left">{{ $activity->event->name }}</td>
                            <td class="text-left">{{ $activity->name }}</td>
                            <td class="text-left">{{ $activity->updated_at }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if (!$activity->event->after_event_registration())
                                        @can(['activity.edit', 'activity.update'])
                                        <form action="{{ route('activity.edit') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                            <button type="submit" disabled class="btn btn-xs btn-default" data-toggle="tooltip" title="Bewerk activiteit">
                                                edit <i class="fa fa-pencil"></i>
                                            </button>
                                        </form>
                                        @endcan
                                        @can(['activity.destroy'])
                                        <form action="{{ route('activity.destroy') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="activity_id" value="{{$activity->id}}">

                                            <button type="submit" disabled class="btn btn-xs btn-default" data-toggle="tooltip" title="Verwijder activiteit">
                                                delete <i class="fa fa-times"></i>
                                            </button>
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
        <!-- END Dynamic Table Full -->
    </div>
@endif
<!-- END Page Container -->
@endsection
