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
                            <a class="link-fx" href="{{ route('dashboard') }}">Dashboard</a>
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
                
                    <form class="d-flex justify-content-evenly" action="{{ route('activity.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-sm-8 col-xl-6">
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if (count($errors) > 0 && array_key_exists("name",$errors)) {{'is-invalid'}} @endif" name="name" placeholder="Activiteit naam *"  value="{{ old('name')}}" required>
                            
                                @if (count($errors) > 0 && array_key_exists("name",$errors))
                                    @foreach($errors['name'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="mb-4">
                                <textarea type="text" class="form-control form-control-lg form-control-alt py-3 @if (count($errors) > 0 && array_key_exists("description",$errors)) {{'is-invalid'}} @endif" name="description" placeholder="Beschrijving">{{ old('description')}}</textarea>
                                
                                @if (count($errors) > 0 && array_key_exists("description",$errors))
                                    @foreach($errors['description'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            
                            <div class="mb-4 form-floating">
                                <select id="eventSelect" class="form-select form-control-alt @if (count($errors) > 0 && array_key_exists("event_id",$errors)) {{'is-invalid'}} @endif" name="event_id" onchange="createCapacityTable(this.value)" required>
                                <option value="">-</option>
                                @foreach($events as $event)
                                    <option
                                        @if (old('event_id') == $event->id)
                                            {{'selected'}} 
                                        @endif
                                    value='{{$event->id}}'>{{$event->name}}</option>
                                @endforeach
                                </select>
                                <label for="eventSelect">Evenement *</label>

                                @if (count($errors) > 0 && array_key_exists("event_id",$errors))
                                    @foreach($errors['event_id'] as $error)
                                        <div class="invalid-feedback">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            
                            <div id="capaciteitContainer"></div>
                            <div id="capaciteitErrors">
                                <div class="is-invalid"></div>
                                @if(old('event_id'))
                                    @php 
                                        $oldKeys = []; 
                                        $oldValues = [];
                                    @endphp
                                    @foreach($events as $event)
                                        @if($event->id == old('event_id'))
                                            @for($x = 1; $x < (count($event->eventrounds)+1); $x++)
                                                @php 
                                                    $key = 'max_participants.' . $x; 
                                                    array_push($oldKeys,$key);
                                                    array_push($oldValues, old($key));
                                                @endphp
                                            @endfor
                                        @endif
                                    @endforeach 
                                    
                                    @if (count($errors) > 0)
                                        @php $capErrors = []; @endphp
                                        @foreach($oldKeys as $key)
                                            @if (array_key_exists($key,$errors))
                                                @foreach($errors[$key] as $error)
                                                    <div class="invalid-feedback">
                                                        {{$error}}
                                                    </div>
                                                    @php $capErrors[$key] = $error @endphp
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif

                                    <script> createCapacityTable({{old('event_id')}}@if(count($oldValues) > 0),true @endif @if(count($capErrors) > 0),true @endif)</script>
                                    
                                @endif
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
    @push('js_scripts')
        <script>
        alert('hallo')
        /*converts php $events var to js*/
            var events = {!!json_encode($events->toArray())!!}; /*dumps all data in html text, is that alright?*/
            @if(isset($oldValues))
                var oldValues = {!!json_encode($oldValues)!!};
            @endif
            @if(isset($capErrors))
                var capErrors = {!!json_encode($capErrors)!!};
            @endif
        /*update 'visually-hidden' class on <label> when <input> is filled to hide or show it */
            function updateLabel(inputId, labelId){
                if(document.getElementById(inputId).value != ""){
                        document.getElementById(labelId).classList.add('visually-hidden')
                }
                else{
                    document.getElementById(labelId).classList.remove('visually-hidden')
                }
            }
        /*clear the container and create max capacity tables dynamicly upon selecting corrosponding event*/
            function createCapacityTable(eventId,oldInputs,hasErrors){

                container = document.getElementById('capaciteitContainer')
                if(container.hasChildNodes()){
                    container.removeChild(container.firstElementChild)
                }
                if(!hasErrors && !!document.getElementById('capaciteitErrors')){
                    document.getElementById('capaciteitErrors').remove()
                }
                /*if function given variable isn't empty aka not an event*/
                if(eventId > 0){
                    events.forEach(function(event){
                        if(event['id'] == eventId){
                            /*create subcontainer*/
                            subContainer = document.createElement('div')
                            container.appendChild(subContainer)
                            /*create collumn label*/
                            collumnLabel = document.createElement('label')
                            collumnLabel.innerHTML = 'Studenten capaciteit per ronde*:'
                            subContainer.appendChild(collumnLabel)
                            /*create collumn*/
                            capaciteitCollumn = document.createElement('div')
                            capaciteitCollumn.classList.add("form-control","form-control-lg", "form-control-alt", "p-0", "mb-4", "d-flex", "justify-content-evenly")
                            subContainer.appendChild(capaciteitCollumn)

                            event['eventrounds'].forEach(function(eventround){
                                /*create input container*/
                                inputContainer = document.createElement('div')
                                inputContainer.classList.add("form-floating","w-100")
                                capaciteitCollumn.appendChild(inputContainer)

                                /*create input*/
                                capaciteitInput = document.createElement('input')
                                capaciteitInput.id = 'cap_' + eventround['round']
                                capaciteitInput.classList.add("form-control","form-control-lg", "form-control-alt", "text-center", "border-end", "border-start", "py-3")
                                capaciteitInput.type = "text"
                                capaciteitInput.min = '0'
                                capaciteitInput.max = '1000'
                                capaciteitInput.name = 'max_participants[' + eventround['round'] + ']'
                                capaciteitInput.required = true
                                if(oldInputs == true){
                                    capaciteitInput.value = oldValues[eventround['round']-1]
                                }
                                if(hasErrors == true && capErrors[('max_participants.'+(eventround['round']))] != null){
                                    
                                    console.log('round: ' + eventround['round'] + ' with value: ' + oldValues[eventround['round']-1])
                                    capaciteitInput.classList.add('is-invalid');
                                }
                                inputContainer.appendChild(capaciteitInput)

                                /*create input label*/
                                inputLabel = document.createElement('label')
                                inputLabel.id = 'capLabel_' + eventround['round']
                                inputLabel.htmlFor = capaciteitInput.id
                                inputLabel.classList.add("text-center","w-100")
                                inputLabel.innerHTML = eventround['start_time'].slice(0,-3) + ' - ' + eventround['end_time'].slice(0,-3)
                                inputContainer.appendChild(inputLabel)

                                /*add oninput listener to input*/
                                capaciteitInput.setAttribute('oninput',`updateLabel('${'cap_' + eventround['round']}', '${'capLabel_' + eventround['round']}')`)
                                
                                if(oldInputs == true){
                                    updateLabel(capaciteitInput.id, inputLabel.id)
                                }
                            })
                        }
                    })
                }
            }

            {{-- @foreach($events as $event)
                <label>Studenten capaciteit per ronde*:</label>
                <div class="form-control form-control-lg form-control-alt p-0 mb-4 d-flex justify-content-evenly">
                @foreach($event->eventrounds as $eventround)
                    <div class="form-floating w-3 ">
                        <input id="cap{{$event->id . '_' . $eventround->round}}" type="number" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="max_participants[{{$event->id}}][{{$eventround->round}}]" value="{{ old('max_participants.' . $event->id . '.' . $eventround->round)}}" required>
                        <label id="capLabel{{$event->id . '_' . $eventround->round}}" for="cap{{$event->id . '_' . $eventround->round}}" class="text-center">{{substr($eventround->start_time,0,-3) . ' - ' . substr($eventround->end_time,0,-3)}}</label>
                    </div>
                @endforeach
                </div>
            @endforeach --}}
        </script>
    @endpush
@endsection
