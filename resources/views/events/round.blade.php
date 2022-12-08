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
                <div>
                    <div class="mt-2">
                        @include('layouts.partials.errorMessages')
                    </div>
                    <form class="d-flex justify-content-evenly" action="{{ route('event.storeRound') }}" method="POST">
                        @csrf
                        <div class="col-sm-8 col-xl-6">
                            <input type="hidden" id="id" name="id" value={{$event->id}}>
                            {{-- <input type="hidden" id="starts_at" name="starts_at" value={{$event->starts_at}}> --}}

                            <p><b>Evenement start op:</b> {{ Carbon\Carbon::parse($event->starts_at)->format('d-m-Y H:i') }}</p>
                            <p><b>Evenement eindigd op:</b> {{ Carbon\Carbon::parse($event->ends_at)->format('d-m-Y H:i') }}</p>

                            <div id="container">
                                {{-- <button type="button" onclick="create_round_inputs()" class="btn btn-sm btn-alt-primary mb-3">Ronde toevoegen</button> --}}
                                <section id="mainsection">
                                    <div class="input-group">
                                        <input type="hidden" id="round" name="round[0]" value="1">
        
                                        <label for="startRound" id="round_label"><b>Ronde 1:</b></label> &nbsp; &nbsp;
                                        <span class="input-group-text">Start</span>
                                        <input type="time" id="startRound" class="form-control" name="startRound[0]" required/>
        
                                        <span class="input-group-text" style="border-left: 0; border-right: 0;">Eind</span>
                                        <input type="time" id="endRound" class="form-control" name="endRound[0]" required/> &nbsp;
                                        <button type="button" onclick="create_round_inputs()" id="addButton" title="Ronde aanmaken" class="btn btn-alt-primary rounded-circle">+</button>
                                        {{-- <button type="button" onclick="" id="deleteButton" title="Ronde verwijderen" class="btn btn-alt-primary rounded-circle">-</button> --}}
                                    </div>
        
                                    <br>
                                    
                                </section>
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
    @push('js_scripts')
        <script>
            var clicks = 1;
            
            // Functie om een nieuwe rij aan te maken voor de rondes
            function create_round_inputs() {
                clicks += 1;

                // var button = document.getElementById("addButton");
                // if (button.style.display="visible") {
                    // button.style.display="none";
                // }

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
                round_input.name = "round["+(clicks-1)+"]";

                round_label.innerHTML = "<b>Ronde " + clicks + ":</b>";

                startRound_input.name = "startRound["+(clicks-1)+"]";
                endRound_input.name = "endRound["+(clicks-1)+"]";

                container.appendChild(clone_section);
            }
        </script>
    @endpush
@endsection
