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
                            <a class="link-fx" href="{{ route('event.show', ['event_id' => Crypt::encrypt($activity->event->id)]) }}">{{$activity->event->name}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{$activity->name}}
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit
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
                                <textarea type="text" class="form-control form-control-lg form-control-alt py-3 @if ($errors->has('description')) {{'is-invalid'}} @endif" name="description" placeholder="Beschrijving" maxlength="255">@if(old('description') === null){{$activity->description}}@else{{old('description')}}@endif</textarea>

                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4 form-floating">
                                <select id="eventSelect" class="form-select form-control-alt @if ($errors->has('event_id')) {{'is-invalid'}} @endif" name="event_id" onchange="createCapacityTable(this.value)" required>
                                @if(count($events) == 0)
                                    <option value="">Geen evenementen beschikbaar.</option>
                                @else
                                    <option value="" style="display:none">-</option>
                                @endif
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

                            <div class="mb-4" id="container-inputs-eventrounds"></div>

                            <div class="mb-4 d-none" id="section-inputs-eventrounds">
                                <label>Studenten capaciteit per ronde: *</label>
                                <div class="form-control form-control-lg form-control-alt p-0 mb-4 d-flex justify-content-evenly container-inputs-eventrounds2"></div>
                            </div>

                            <div class="form-floating w-100 d-none" id="section-inputs-eventrounds2">
                                <input id="" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" type="number" step="1" min="0" max="1000" name="">
                                <label id="" for="" class="text-center w-100"></label>
                            </div>
                        </div>

                        <div class="col-sm-8 col-xl-5">
                            <div class="mb-4 ">
                                <div style="overflow-y:hidden; height:11.75rem" class="form-control form-control-alt rounded-0 rounded-top py-3 pb-0">
                                    <div style="overflow:hidden; height:11.75rem;" class="position-relative">
                                        <img id='headerPreview' style="top: 50%; left: 50%; transform: translate(-50%, -50%); min-height: 11.75rem; min-width: 100%" class="w-100 position-absolute" src="@if(isset($activity->image)) {{asset('storage/activityHeaders/'.$activity->image)}} @else {{asset('media/photos/photo2@2x.jpg')}} @endif" alt="kan afbeelding niet inladen.">
                                        {{-- image still stretches a bit cuz I can't not give it a width or height; this is like near impossible --}}
                                    </div>                                
                                </div>
                                <label for="imageInput" class="btn btn-lg btn-alt-primary rounded-0 rounded-bottom py-3 text-muted fw-normal w-100 @if ($errors->has('image')) {{'is-invalid'}} @endif">Afbeelding</label>
                                <input id="imageInput" class="visually-hidden" type="file" name="image" onchange="headerPreview.src=window.URL.createObjectURL(this.files[0])" accept="image/png, image/jpg, image/jpeg">
                            </div>
                            @if ($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                Wijzigingen Opslaan
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
            @for($x = 1; $x < (count($event->eventrounds)+1); $x++)
                @php
                    $key = 'max_participants.' . $x;
                    array_push($oldKeys,$key);
                    array_push($oldValues, old($key));
                @endphp
            @endfor
            {{-- {{var_dump($oldValues, $capErrors)}} --}}
            <script> createCapacityTable({{$event->id}}@if(count($oldValues) > 0),true @endif)</script>
        @elseif(old('event_id') === null && $activity->event()->first() !== null && $activity->event()->first()->id == $event->id)
            @for($x = 1; $x < (count($event->eventrounds)+1); $x++)
                @php
                    $key = 'max_participants.' . $x;
                    $eventround = $event->eventrounds[$x-1];
                    array_push($oldKeys,$key);
                    array_push($oldValues, $activity->rounds()->where("eventround_id", $eventround->id)->first()->max_participants);
                @endphp
            @endfor
            {{-- {{var_dump($oldValues, $capErrors)}} --}}
            <script> createCapacityTable({{$event->id}}@if(count($oldValues) > 0),true @endif)</script>
        @endif
    @endforeach

    @push('js_scripts')
        <script>
        @if(isset($oldValues))
            var oldValues = {!!json_encode($oldValues)!!};
        @endif

        /*update 'visually-hidden' class on <label> when <input> is filled to hide or show it */
        function updateLabel(input_value, labelId){
            var label = document.getElementById(labelId);
            if(input_value != "" && !label.classList.contains("visually-hidden")){
                label.classList.add('visually-hidden')
            }
            else if (input_value == "" && label.classList.contains("visually-hidden")){
                label.classList.remove('visually-hidden')
            }
        }

        /*clear the container and create max capacity tables dynamicly upon selecting corrosponding event*/
        function createCapacityTable(eventId,oldInputs){
            var container = document.getElementById("container-inputs-eventrounds");

            while(container.lastElementChild) {
                container.removeChild(container.lastElementChild);
            }

            // section and section2 are templates, the clone_section and container_clone_section2 are clones of the template that can be changed.
            var section = document.getElementById("section-inputs-eventrounds");
            var section2 = document.getElementById("section-inputs-eventrounds2");
            var clone_section = section.cloneNode(true);

            if (clone_section.classList.contains("d-none")) {
                clone_section.classList.remove("d-none");
            }
            if (clone_section.id == "section-inputs-eventrounds") {
                clone_section.id = "";
            }

            container.appendChild(clone_section);

            @php forEach($events as $event){ @endphp
                if({!!json_encode($event->id)!!} == eventId){
                @php forEach($event->eventrounds as $eventround) { @endphp
                    var clone_section2 = section2.cloneNode(true);
                    var container_clone_section2 = container.querySelector('div.container-inputs-eventrounds2');

                    if (clone_section2.id == "section-inputs-eventrounds2") {
                        clone_section2.id = "";
                    }

                    var label = clone_section2.querySelector('label');
                    var input = clone_section2.querySelector('input');

                    var eventround = {!!json_encode($eventround)!!};
                    var time = "{{App\Models\Eventround::find($eventround->id)->startAndEndTime()}}";
                    var name = 'max_participants[' + eventround['round'] + ']';
                    var label_id = 'capLabel_' + eventround['round'];
                    var input_id = 'cap_' + eventround['round'];

                    if (clone_section2.classList.contains("d-none")) {
                        clone_section2.classList.remove("d-none");
                    }

                    /* change label */
                    label.innerText = time;
                    label.id = label_id;
                    label.htmlFor = input_id;

                    if(oldInputs == true){
                        input.value = oldValues[eventround['round']-1];
                    }

                    /* change input */
                    input.id = input_id;
                    input.title = time;
                    input.name = name;
                    input.required = true;

                    /*add oninput listener to input*/
                    input.setAttribute('oninput',`updateLabel(this.value, '${label_id}')`);

                    container_clone_section2.appendChild(clone_section2);

                    if(oldInputs == true){
                        updateLabel(input.value, label.id);
                    }
                @php } @endphp
                }
            @php } @endphp
        }
        </script>
    @endpush
@endsection
