@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                      Rondes
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                          <a class="link-fx" href="">{{$event->name}}</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                          Rondes
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
                    <form class="d-flex justify-content-evenly" action="{{ route('event.storeRound') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-8 col-xl-6">
                            <p>Evenement start op: {{$event->starts_at}}</p>
                            <p>Evenement eindigd op: {{$event->ends_at}}</p>

                            <br>

                            <div class="input-group">
                              <label for="startRound1">Ronde 1: </label> &nbsp;  &nbsp;
                              <span class="input-group-text">Start</span>
                              <input type="datetime-local" class="form-control" name="startRound1" required/>

                              <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                              <input type="datetime-local" class="form-control" name="endRound1" required/>
                            </div>

                            <br>

                            <div class="input-group">
                                <label for="startRound2">Ronde 2: </label> &nbsp;  &nbsp;
                                <span class="input-group-text">Start</span>
                                <input type="datetime-local" class="form-control" name="startRound2" required/>
  
                                <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                <input type="datetime-local" class="form-control" name="endRound2" required/>
                            </div>

                            <br>

                            <div class="input-group">
                                <label for="startRound3">Ronde 3: </label> &nbsp; &nbsp;
                                <span class="input-group-text">Start</span>
                                <input type="datetime-local" class="form-control" name="startRound3" required/>
  
                                <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                <input type="datetime-local" class="form-control" name="endRound3" required/>
                            </div>
                        </div>
                        
                        <div class="col-sm-8 col-xl-5">
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-lg btn-alt-primary">
                                Rondes toevoegen
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
