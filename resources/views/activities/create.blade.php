@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Nieuwe Activiteit
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="">Mijn Activiteiten</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Nieuwe Activiteit
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded px-5 py-3">
            <div class="block-content block-content-full">
                <div >
                    @if (count($errors) > 0)
                        @foreach($errors as $error)
                            <div class="mb-4 alert alert-danger">
                                {{$error[0]}}
                            </div>
                        @endforeach
                    @endif
                    <form class="d-flex justify-content-evenly" action="{{ route('activity.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-sm-8 col-xl-6">
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg form-control-alt py-3" name="name" placeholder="Activiteit naam"  value="{{ old('name')}}" required>
                            </div>
                            

                            <div class="mb-4">
                                <textarea type="text" class="form-control form-control-lg form-control-alt py-3" name="description" placeholder="Beschrijving">{{ old('description')}}</textarea>
                            </div>

                            <div class="mb-4 form-floating">
                                <select id="eventSelect" class="form-select form-control-alt" name="event_id" required>
                                <option value="">-</option>
                                @foreach($events as $event)
                                    <option
                                        @if (old('event_id') == $event->id)
                                            {{'selected'}} 
                                        @endif
                                    value='{{$event->id}}'>{{$event->name}}</option>
                                @endforeach
                                </select>
                                <label for="eventSelect">Evenement:</label>
                            </div>

                            <div class="mb-4">
                                <input type="number" class="form-control form-control-lg form-control-alt py-3" min="0" max="1000" name="max_participants" placeholder="Max aantal studenten per ronde" value="{{ old('max_participants')}}" required>
                            </div>

                        
                        </div>
                        <div class="col-sm-8 col-xl-5">
                            <div class="mb-4 ">
                                <div style="overflow-y:hidden; height:11.75rem" class="form-control form-control-alt rounded-0 rounded-top py-3 row">
                                    <img id="headerPreview" class="bg-white w-100 p-0" src="">
                                </div>
                                <input class="form-control form-control-alt rounded-0 rounded-bottom py-3 w-100 row" type="file" name="image"onchange="headerPreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                Maak Activiteit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
