@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Nieuw evenement
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">

                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="">Mijn Evenementen</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Nieuw evenement
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
                <div>
                    <div class="mt-2">
                        @include('layouts.partials.errorMessages')
                    </div>
                    {{-- @if (count($errors) > 0)
                        {{var_dump($errors)}}
                        @foreach($errors as $error)
                            {{var_dump($error)}}
                            <div class="mb-4 alert alert-danger">
                                {{$error[0]}}
                            </div>
                        @endforeach
                    @endif --}}
                    <form class="d-flex justify-content-evenly" action="{{ route('event.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-sm-8 col-xl-6">
                            <div class="mb-4">
                              <input type="text" class="form-control form-control-lg form-control-alt py-3" name="name" placeholder="Naam" required>
                            </div>

                            <div class="mb-4">
                              <textarea type="text" class="form-control form-control-lg form-control-alt py-3" name="description" placeholder="Beschrijving" required></textarea>
                            </div>

                            <div class="mb-4">
                              <input type="text" class="form-control form-control-lg form-control-alt py-3" name="location" placeholder="Locatie" required>
                            </div>

                            <div class="input-group">
                                <label for="startEnlistment"><b>Evenement:</b></label> &nbsp;  &nbsp;
                                <span class="input-group-text">Start</span>
                                <input type="datetime-local" class="form-control" name="startDate" required/>
                                @if($errors->has('startDate'))
                                    <div class="alert alert-danger">{{ $errors->first('startDate') }}</div>
                                @endif

                                <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                <input type="datetime-local" class="form-control" name="endDate" required/>
                                @if($errors->has('endDate'))
                                    <div class="alert alert-danger">{{ $errors->first('endDate') }}</div>
                                @endif
                            </div>

                            <br>

                            <div class="input-group">
                                <label for="startEnlistment"><b>Inschrijven:</b></label> &nbsp;  &nbsp;
                                <span class="input-group-text">Start</span>
                                <input type="datetime-local" class="form-control" name="startEnlistment" required/>
                                @if($errors->has('startEnlistment'))
                                    <div class="alert alert-danger">{{ $errors->first('startEnlistment') }}</div>
                                @endif

                                <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                <input type="datetime-local" class="form-control" name="endEnlistment" required/>
                                @if($errors->has('endEnlistment'))
                                    <div class="alert alert-danger">{{ $errors->first('endEnlistment') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-8 col-xl-5">
                            <div class="mb-4 ">
                                <div style="overflow-y:hidden; height:11.75rem" class="form-control form-control-alt rounded-0 rounded-top py-3 row">
                                  <img id="headerPreview" class="bg-white w-100 p-0" src="">
                                </div>
                                <input class="form-control form-control-alt rounded-0 rounded-bottom py-3 w-100 row" type="file" name="image"onchange="headerPreview.src=window.URL.createObjectURL(this.files[0])" accept="image/png, image/jpg, image/jpeg">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                Maak evenement
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
