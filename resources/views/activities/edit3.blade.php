@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Edit activiteit
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
                            Edit activiteit
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

                    <form class="d-flex justify-content-evenly" action="{{ route('activity.update') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="activity_id" value="@if(old('activity_id') === null){{$activity->id}}@else{{old('activity_id')}}@endif"/>

                        <div class="col-sm-8 col-xl-6">
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('name')) {{'is-invalid'}} @endif" name="name" placeholder="Activiteit naam *"  value="@if(old('name') === null){{$activity->name}}@else{{old('name')}}@endif" maxlength="255" required>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <textarea type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('description')) {{'is-invalid'}} @endif" name="description" placeholder="Beschrijving">@if(old('description') === null){{$activity->description}}@else{{old('description')}}@endif</textarea>

                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4 form-floating">
                                <select id="eventSelect" class="form-select form-control-alt @if ($errors->has('event_id')) {{'is-invalid'}} @endif" name="event_id" onchange="createCapacityTable(this.value)" required>
                                <option value="" style="display:none">-</option>
                                @foreach($events as $event)
                                    <option
                                        @if ((old('event_id') === null && $activity->event()->first()->id === $event->id) || (old('event_id') == $event->id))
                                            {{'selected'}}
                                        @endif
                                    value='{{$event->id}}'>{{$event->name}}</option>
                                @endforeach
                                </select>
                                <label for="eventSelect">Evenement *</label>

                                @if ($errors->has('event_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('event_id') }}
                                    </div>
                                @endif
                            </div>

                            <div id="capaciteitContainer"></div>
                            <div id="capaciteitErrors">
                                @php $capErrors = []; @endphp
                                @if (count($errors) > 0)
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

    @foreach($events as $event)
        @if(old('event_id') !== null && $event->id == old('event_id'))
            @php
                $oldKeys = [];
                $oldValues = [];
            @endphp
            @for($x = 1; $x < (count($event->eventrounds)+1); $x++)
                @php
                    $key = 'max_participants.' . $x;
                    array_push($oldKeys,$key);
                    array_push($oldValues, old($key));
                @endphp
            @endfor
            {{-- {{var_dump($oldValues, $capErrors)}} --}}
            <script> createCapacityTable({{$event->id}}@if(count($oldValues) > 0),true @endif @if(count($capErrors) > 0),true @endif)</script>
        @elseif(old('event_id') === null && $activity->event()->first() !== null && $activity->event()->first()->id == $event->id)
            @php
                $oldKeys = [];
                $oldValues = [];
            @endphp
            @for($x = 1; $x < (count($event->eventrounds)+1); $x++)
                @php
                    $key = 'max_participants.' . $x;
                    $eventround = $event->eventrounds[$x-1];
                    array_push($oldKeys,$key);
                    array_push($oldValues, $activity->rounds()->where("eventround_id", $eventround->id)->first()->max_participants);
                @endphp
            @endfor
            {{-- {{var_dump($oldValues, $capErrors)}} --}}
            <script> createCapacityTable({{$event->id}}@if(count($oldValues) > 0),true @endif @if(count($capErrors) > 0),true @endif)</script>
        @endif
    @endforeach

    @push('js_scripts')
        <script>
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

        function test(value) {
            @php
                $oldKeys = [];
                $oldValues = [];
                @endphp console.log({!!json_encode($oldValues)!!}); @php
                foreach($events as $event) { @endphp
                if({{($activity->event()->first() !== null && $activity->event()->first()->id == $event->id) ? : 0}} !== 0 && {!!json_encode($activity->event()->first()->id)!!} == parseInt(value)) {
                    @php
                        for($x = 1; $x < (count($event->eventrounds)+1); $x++) {
                            $key = 'max_participants.' . $x;
                            $eventround = $event->eventrounds[$x-1];
                            array_push($oldKeys,$key);
                            array_push($oldValues, ($activity->rounds()->where('eventround_id', $eventround->id)->first() !== null) ? $activity->rounds()->where('eventround_id', $eventround->id)->first()->max_participants : 0);
                        }
                    @endphp
                }
            @php } @endphp
            console.log({!!json_encode($oldValues)!!});

            createCapacityTable(value @if(count($oldValues) > 0),true @endif @if(count($capErrors) > 0),true @endif)
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


        </script>
    @endpush
@endsection
