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

                    <form class="d-flex justify-content-evenly" action="{{ route('activity.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="activity_id" value="@if(old('activity_id') === null){{$activity->activity_id}}@else{{old('activity_id')}}@endif"/>

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
                                <select id="eventSelect" class="form-select form-control-alt @if ($errors->has('event_id')) {{'is-invalid'}} @endif" name="event_id" onchange="test(this.value)" required>
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

                            <div class="mb-4" id="container-inputs-eventrounds">

                            </div>

                            <div class="mb-4 d-none" id="section-inputs-eventrounds">
                                <label>Studenten capaciteit per ronde: *</label>
                                <div class="form-control form-control-lg p-0 mb-4 d-flex justify-content-evenly container-inputs-eventrounds2">

                                </div>
                            </div>

                            <div class="w-3 d-none" id="section-inputs-eventrounds2">
                                <label class="text-center"></label>
                                <input type="number" data-toggle="tooltip" title="" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="" value="" required>
                            </div>

                            {{-- <div class="mb-4" id="section-inputs-eventrounds">
                                <label>Studenten capaciteit per ronde: *</label>
                                <div class="form-control form-control-lg p-0 mb-4 d-flex justify-content-evenly">
                                {{-- @foreach($event->eventrounds as $eventround)
                                {{-- form-floating
                                    <div class="w-3">
                                        <label class="text-center">{{$eventround->startAndEndTime()}}</label>
                                        <input type="number" data-toggle="tooltip" title="{{$eventround->startAndEndTime()}}" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="max_participants[{{$event->id}}][{{$eventround->round}}]" value="{{ old('max_participants.' . $event->id . '.' . $eventround->round)}}" required>
                                        {{-- <label class="text-center">{{substr($eventround->start_time,0,-3) . ' - ' . substr($eventround->end_time,0,-3)}}</label>
                                    </div>
                                @endforeach
                                @if (old('event_id') !== null)
                                    @foreach(Event::find(old('event_id'))->eventrounds as $eventround)
                                        <div class="w-3">
                                            <label class="text-center">{{$eventround->startAndEndTime()}}</label>
                                            <input type="number" data-toggle="tooltip" title="{{$eventround->startAndEndTime()}}" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="max_participants[{{$event->id}}][{{$eventround->round}}]" value="{{ old('max_participants.' . $event->id . '.' . $eventround->round)}}" required>
                                        </div>
                                    @endforeach
                                @elseif (old('event_id') !== null)
                                    @foreach(Event::find(old('event_id'))->eventrounds as $eventround)
                                        <div class="w-3">
                                            <label class="text-center">{{$eventround->startAndEndTime()}}</label>
                                            <input type="number" data-toggle="tooltip" title="{{$eventround->startAndEndTime()}}" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="max_participants[{{$event->id}}][{{$eventround->round}}]" value="{{ old('max_participants.' . $event->id . '.' . $eventround->round)}}" required>
                                        </div>
                                    @endforeach
                                @elseif ($activity->event()->first() !== null)
                                    @foreach($activity->event()->first()->eventrounds as $eventround)
                                        <div class="w-3">
                                            <label class="text-center">{{$eventround->startAndEndTime()}}</label>
                                            <input type="number" data-toggle="tooltip" title="{{$eventround->startAndEndTime()}}" class="form-control form-control-lg form-control-alt text-center border-end border-start py-3" min="0" max="1000" name="max_participants[{{$event->id}}][{{$eventround->round}}]" value="{{ old('max_participants.' . $event->id . '.' . $eventround->round)}}" required>
                                        </div>
                                    @endforeach
                                @endif
                                </div>

                                @foreach(old('phone_restrictions', isset($promotion) ? $promotion->phone_restrictions : []) as $key => $item)
                                    <div class="form-group col-sm-2">
                                        <input class="form-control" name="phone_restrictions[]" type="text" value="{{$item}}">
                                    </div>
                                @endforeach
                            </div> --}}

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
    {{-- createCapacityTable(event)
    if ({{old('event_id') !== null && Event::find(old('event_id')) !== null}}) {
        createCapacityTable({{Event::find(old('event_id'))}});
    } else if({{$activity->event()->first() !== null}}) {
        createCapacityTable({{$activity->event()->first()}});
    } --}}

    @php
        $oldValues = [];
    @endphp
    @foreach($events as $event)
        @if(old('event_id') !== null && $event->id == old('event_id'))
            @for($x = 0; $x < count($event->eventrounds); $x++)
                @php
                    $key1 = 'max_participants.' . $x;  // + 1?
                    $eventround = $event->eventrounds[$x];
                    $key = 'max_participants['.$event->id.']['.$eventround->round.']';
                    array_push($oldValues, array("time"=>$eventround->startAndEndTime(), "key"=>$key, "value"=>old($key1)));
                @endphp
            @endfor
        @elseif(old('event_id') === null && $activity->event()->first() !== null && $activity->event()->first()->id == $event->id)
            @for($x = 0; $x < count($event->eventrounds); $x++)
                @php
                    $eventround = $event->eventrounds[$x];
                    $key = 'max_participants['.$event->id.']['.$eventround->round.']';
                    array_push($oldValues, array("time"=>$eventround->startAndEndTime(), "key"=>$key, "value"=>$activity->rounds()->where("eventround_id", $eventround->id)->first()->max_participants));
                @endphp
            @endfor
        @endif
    @endforeach

    @push('js_scripts')
        <script>
            window.onload = function() {
                createCapacityTable({!!json_encode($oldValues)!!});
            };

            function removeChilds(parent) {
                while (parent.lastChild) {
                    parent.removeChild(parent.lastChild);
                }
            }

            function test(value) {
                var oldValues = [];
                <?php foreach($events as $event) { ?>
                    if(value == {!!json_encode($event->id)!!}) {
                        <?php for($x = 0; $x < count($event->eventrounds); $x++) { ?>
                            <?php $eventround = $event->eventrounds[$x] ?>
                            var key = 'max_participants[{{$event->id}}][{{$eventround->round}}]';
                            oldValues.push({"time": "{{$eventround->startAndEndTime()}}", "key": key, "value": "{{($activity->rounds()->where('eventround_id', $eventround->id)->first() !== null) ? $activity->rounds()->where('eventround_id', $eventround->id)->first()->max_participants : 0 }}"})
                        <?php } ?>
                    }
                <?php } ?>

                createCapacityTable(oldValues)
            }
            // Functie om een nieuwe rij aan te maken voor de rondes
            function createCapacityTable(oldValues) {
                // Haal alle elementen op
                var container = document.getElementById("container-inputs-eventrounds");
                var section = document.getElementById("section-inputs-eventrounds");
                var section2 = document.getElementById("section-inputs-eventrounds2");
                // var container_clone_section2 = container.querySelector('div.container-inputs-eventrounds2');
                var clone_section = section.cloneNode(true);
                // var clone_section2 = section2.cloneNode(true);

                // if(container.hasChildNodes()){
                //     removeChilds(container);
                // }
                while(container.lastElementChild) {
                    container.removeChild(container.lastElementChild);
                }

                if (clone_section.classList.contains("d-none")) {
                    clone_section.classList.remove("d-none");
                }
                container.appendChild(clone_section);
                // console.log(container);
                // let container_clone_section2 = container.querySelector('div.container-inputs-eventrounds2');
                // container_clone_section2.remove();

                for (let index = 0; index < oldValues.length; index++) {
                    let clone_section2 = section2.cloneNode(true);
                    let container_clone_section2 = container.querySelector('div.container-inputs-eventrounds2');
                    // console.log(container_clone_section2);

                    let label = clone_section2.querySelector('label');
                    let input = clone_section2.querySelector('input');

                    if (clone_section2.classList.contains("d-none")) {
                        clone_section2.classList.remove("d-none");
                    }

                    label.innerText = oldValues[index]["time"];

                    input.value = oldValues[index]["value"];
                    input.title = oldValues[index]["time"];
                    input.name = oldValues[index]["key"];

                    container_clone_section2.appendChild(clone_section2);
                }
            }
        </script>
    @endpush
@endsection
