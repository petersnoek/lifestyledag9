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
                <div class="col-sm-8 col-xl-6">
                  
                    <!-- @foreach($events as $event)
                      <div>{{$event->id}}{{$event->name}}</div>
                    @endforeach
                    @foreach($rounds as $round)
                      <div>{{$round->id}}</div>
                    @endforeach -->
                    <form action="{{ route('activity.create.end') }}" method="POST">
                        
                        @csrf
                        
                        <!-- live query when select drop down -->

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt py-3" name="naam" placeholder="Activiteit Naam" required>
                        </div>

                        <div class="mb-4">
                          <textarea type="text" class="form-control form-control-lg form-control-alt py-3" id="beschrijving" name="beschrijving" placeholder="Beschrijving"></textarea>
                        </div>

                        <div class="mb-4 form-control form-control-lg form-control-alt py-3">
                          <label class="ml-3">Evenement:</label>
                          <select class="" id="event" name="event" required>
                            <option>-</option>
                          @foreach($events as $event)
                            <option value='{{$event->id}}'>{{$event->name}}</option>
                          @endforeach
                          </select>
                        </div>

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-alt py-3" id="capaciteit" name="capaciteit" placeholder="Max aantal studenten" required>
                        </div>
                        
                        <div>
                          <input type="hidden" value='{{Auth::user()->id}}' name="user_id">
                        </div>


                        <button type="submit" class="btn btn-lg btn-alt-primary" id="sendInvite" this.form.submit();">
                          <i></i> Maak Activiteit
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
