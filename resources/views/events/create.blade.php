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
                        {{-- @include('layouts.partials.errorMessages') --}}
                    </div>
                    <form class="d-flex justify-content-evenly" action="{{ route('event.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-sm-8 col-xl-6">
                            <div class="mb-4">
                              <input type="text" class="form-control form-control-lg form-control-alt py-3" value="{{ old('name')}}" name="name" placeholder="Naam *" required>
                            </div>
                            @if($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif

                            <div class="mb-4">
                              <textarea type="text" class="form-control form-control-lg form-control-alt py-3" name="description" placeholder="Beschrijving *" required>{{{ old('description') }}}</textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                            @endif

                            <div class="mb-4">
                              <input type="text" class="form-control form-control-lg form-control-alt py-3" value="{{ old('location')}}" name="location" placeholder="Locatie *" required>
                            </div>
                            @if($errors->has('location'))
                                <div class="alert alert-danger">{{ $errors->first('location') }}</div>
                            @endif

                            <div class="input-group row" style="display:block; align:center;">
                                <div class=".col-md-6" style="width: 220px;">
                                    <label for="startEnlistment"><b>Evenement:</b></label> &nbsp;  &nbsp;
                                    <span class="input-group-text">Start</span>
                                    <input type="datetime-local" class="form-control" value="{{ old('startDate')}}" name="startDate" title="Start evenement" required/>
                                    @if($errors->has('startDate'))
                                        <div class="alert alert-danger">{{ $errors->first('startDate') }}</div>
                                    @endif
                                </div>

                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                    <input type="datetime-local" class="form-control" value="{{ old('endDate')}}" name="endDate" title="Eind evenement" required/>
                                    @if($errors->has('endDate'))
                                        <div class="alert alert-danger">{{ $errors->first('endDate') }}</div>
                                    @endif
                                </div>
                            </div>

                            <br>

                            <div class="input-group row" style="display:block; align:center;">
                                <div class=".col-md-6" style="width: 220px;">
                                    <label for="startEnlistment"><b>Inschrijven:</b></label> &nbsp;  &nbsp;
                                    <span class="input-group-text">Start</span>
                                    <input type="datetime-local" class="form-control" value="{{ old('startEnlistment')}}" name="startEnlistment" title="Start inschrijven" required/>
                                    @if($errors->has('startEnlistment'))
                                        <div class="alert alert-danger">{{ $errors->first('startEnlistment') }}</div>
                                    @endif
                                </div>

                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                    <input type="datetime-local" class="form-control" value="{{ old('endEnlistment')}}" name="endEnlistment" title="Eind inschrijven" required/>
                                    @if($errors->has('endEnlistment'))
                                        <div class="alert alert-danger">{{ $errors->first('endEnlistment') }}</div>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="input-group">
                                <div id="container">
                                    <button type="button" onclick="create_round_inputs()" id="addButton" title="Ronde toevoegen" class="btn btn-alt-primary rounded-circle">+</button>
                                    <section id="mainsection">
                                        <div class="input-group">
                                            <input type="hidden" id="round" name="round[0]" value="1"> 

                                            <label for="startRound" id="round_label"><b>Ronde 1:</b></label> &nbsp; &nbsp;
                                            <span class="input-group-text">Start</span>
                                            <input type="time" id="startRound" class="form-control" name="startRound[0]" title="Start ronde" required/>
                                            @if($errors->has('startRound.*'))
                                                <div class="alert alert-danger">{{ $errors->first('startRound.*') }}</div>
                                            @endif
            
                                            <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                            <input type="time" id="endRound" class="form-control" name="endRound[0]" title="Eind ronde" required/> &nbsp;
                                            @if($errors->has('endRound.*'))
                                                <div class="alert alert-danger">{{ $errors->first('endRound.*') }}</div>
                                            @endif
                                        </div>
        
                                        <br>
                                        
                                    </section>
                                </div> 
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
    @push('js_scripts')
        <script>
            var clicks = 1;
            
            // Functie om een nieuwe rij aan te maken voor de rondes
            function create_round_inputs() {
                clicks += 1;

                var container = document.getElementById("container");
                var section = document.getElementById("mainsection");
                var clone_section = section.cloneNode(true);

                clone_section.querySelector('#round').id = "round"+clicks;
                clone_section.querySelector('#startRound').id = "startRound"+clicks;
                clone_section.querySelector('#endRound').id = "endRound"+clicks;
                clone_section.querySelector('#round_label').id = "round_label"+clicks;
                
                var round_input = clone_section.querySelector('#round'+clicks);
                var startRound_input = clone_section.querySelector('#startRound'+clicks);
                var endRound_input = clone_section.querySelector('#endRound'+clicks);
                var round_label = clone_section.querySelector('#round_label'+clicks);

                round_input.value = clicks;
                round_input.name = "round[" + (clicks - 1) + "]";

                round_label.innerHTML = "<b>Ronde " + clicks + ":</b>";

                startRound_input.name = "startRound[" + (clicks - 1) + "]";
                endRound_input.name = "endRound[" + (clicks - 1) + "]";

                container.appendChild(clone_section);
            }
        </script>
    @endpush
@endsection
