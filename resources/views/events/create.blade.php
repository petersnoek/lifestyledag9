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
                              <input class="@if (count($errors) > 0 && array_key_exists("name",$errors)) {{"is-invalid"}}@endif form-control form-control-lg form-control-alt py-3" type="text" value="{{ old('name')}}" name="name" placeholder="Naam *" required>
                                @if (count($errors) > 0 && array_key_exists("name",$errors))
                                    @foreach($errors['name'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif 
                            </div>
                        

                            <div class="mb-4">
                              <textarea class="@if (count($errors) > 0 && array_key_exists("description",$errors)) {{"is-invalid"}}@endif form-control form-control-lg form-control-alt py-3" type="text" name="description" placeholder="Beschrijving *" required>{{{ old('description') }}}</textarea>
                                @if (count($errors) > 0 && array_key_exists("description",$errors))
                                    @foreach($errors['description'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif 
                            </div>


                            <div class="mb-4">
                              <input class="@if (count($errors) > 0 && array_key_exists("location",$errors)) {{"is-invalid"}}@endif form-control form-control-lg form-control-alt py-3" type="text" value="{{ old('location')}}" name="location" placeholder="Locatie *" required>
                                @if (count($errors) > 0 && array_key_exists("location",$errors))
                                    @foreach($errors['location'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif 
                            </div>

                            <label for="startEnlistment"><b>Evenement:</b></label>
                            <div class="row justify-content-center">
                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text">Start evenement</span>
                                    <input type="datetime-local" class="@if (count($errors) > 0 && array_key_exists("statDate",$errors)) {{"is-invalid"}}@endif form-control" value="{{ old('startDate')}}" name="startDate" title="Start evenement" required/>
                                    @if (count($errors) > 0 && array_key_exists("startDate",$errors))
                                        @foreach($errors['startDate'] as $error)
                                            <div class="invalid-feedback">
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind evenement</span>
                                    <input type="datetime-local" class="@if (count($errors) > 0 && array_key_exists("endDate",$errors)) {{"is-invalid"}}@endif form-control" value="{{ old('endDate')}}" name="endDate" title="Eind evenement" required/>
                                    @if (count($errors) > 0 && array_key_exists("endDate",$errors))
                                        @foreach($errors['endDate'] as $error)
                                            <div class="invalid-feedback">
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <br>

                            <label for="startEnlistment"><b>Inschrijven:</b></label>
                            <div class="row justify-content-center">
                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text">Start inschrijven</span>
                                    <input type="datetime-local" class="@if (count($errors) > 0 && array_key_exists("startEnlistment",$errors)) {{"is-invalid"}}@endif form-control" value="{{ old('startEnlistment')}}" name="startEnlistment" title="Start inschrijven" required/>
                                    @if (count($errors) > 0 && array_key_exists("startEnlistment",$errors))
                                        @foreach($errors['startEnlistment'] as $error)
                                            <div class="invalid-feedback">
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class=".col-md-6" style="width: 220px;">
                                    <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind inschrijven</span>
                                    <input type="datetime-local" class="@if (count($errors) > 0 && array_key_exists("endEnlistment",$errors)) {{"is-invalid"}}@endif form-control" value="{{ old('endEnlistment')}}" name="endEnlistment" title="Eind inschrijven" required/>
                                    @if (count($errors) > 0 && array_key_exists("endEnlistment",$errors))
                                        @foreach($errors['endEnlistment'] as $error)
                                            <div class="invalid-feedback">
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="input-group">
                                <div id="container">
                                    <section id="mainsection">
                                        <div class="input-group">
                                            <input type="hidden" id="round" name="round[0]" value="1"> 

                                            <label for="startRound" id="round_label"><b>Ronde 1:</b></label> &nbsp; &nbsp;
                                            <span class="input-group-text">Start</span>
                                            <input type="time" id="startRound" class="@if (count($errors) > 0 && array_key_exists("startRound.*",$errors)) {{"is-invalid"}}@endif form-control" name="startRound[0]" title="Start ronde" required/>
                                            @if (count($errors) > 0 && array_key_exists("startRound.*",$errors))
                                                @foreach($errors['startRound.*'] as $error)
                                                    <div class="invalid-feedback">
                                                        {{$error}}
                                                    </div>
                                                @endforeach
                                            @endif
            
                                            <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                            <input type="time" id="endRound" class="@if (count($errors) > 0 && array_key_exists("endRound.*",$errors)) {{"is-invalid"}}@endif form-control" name="endRound[0]" title="Eind ronde" required/> &nbsp;
                                            @if (count($errors) > 0 && array_key_exists("endRound.*",$errors))
                                                @foreach($errors['endRound.*'] as $error)
                                                    <div class="invalid-feedback">
                                                        {{$error}}
                                                    </div>
                                                @endforeach
                                            @endif
                                        
                                        </div>
        
                                        <br>
                                        
                                    </section>
                                </div> 
                                <div class="w-100 d-flex justify-content-center">
                                    <button type="button" onclick="create_round_inputs()" id="addButton" title="Ronde toevoegen" class="btn btn-alt-primary rounded">+ Ronde Toevoegen</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8 col-xl-5">
                            <div class="mb-4 ">
                                <div style="overflow-y:hidden; height:11.75rem" class="form-control form-control-alt rounded-0 rounded-top py-3 pb-0">
                                    <img id="headerPreview" class="w-100 p-0" src="{{asset('media/photos/photo2@2x.jpg')}}" alt="Activiteit header preview">
                                </div>
                                <label for="imageInput" class="btn btn-lg btn-alt-primary rounded-0 rounded-bottom py-3 text-muted fw-normal w-100 @if (count($errors) > 0 && array_key_exists("image",$errors)) {{'is-invalid'}} @endif">Afbeelding</label>
                                <input id="imageInput" class="visually-hidden" type="file" name="image" onchange="headerPreview.src=window.URL.createObjectURL(this.files[0])" accept="image/png, image/jpg, image/jpeg">
                            </div>
                            @if (count($errors) > 0 && array_key_exists("image",$errors))
                                @foreach($errors['image'] as $error)
                                    <div class="invalid-feedback">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                    Maak Evenement
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

                // Haal alle elementen op
                var container = document.getElementById("container");
                var section = document.getElementById("mainsection");
                var clone_section = section.cloneNode(true);

                // Clone de elementen
                clone_section.querySelector('#round').id = "round"+clicks;
                clone_section.querySelector('#startRound').id = "startRound"+clicks;
                clone_section.querySelector('#endRound').id = "endRound"+clicks;
                clone_section.querySelector('#round_label').id = "round_label"+clicks;
                
                var round_input = clone_section.querySelector('#round'+clicks);
                var startRound_input = clone_section.querySelector('#startRound'+clicks);
                var endRound_input = clone_section.querySelector('#endRound'+clicks);
                var round_label = clone_section.querySelector('#round_label'+clicks);

                // Pas het nummer aan naar het aantal rondes
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
