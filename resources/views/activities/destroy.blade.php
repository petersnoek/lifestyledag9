@extends('layouts.backend')

@section('content')
    <div class="content">
        <div class="block block-rounded px-5 py-3">
            <div class="block-content block-content-full">
                <div>
                    <div class="block-rounded px-5 py-3 alert alert-danger">
                    {{-- {{dd($activity)}} --}}
                        <h1>Weet je zeker dat je de activiteit '{{$activity[0]->name}}' wilt verwijderen?</h1>
                        <ul>
                            <li>De activiteit '{{$activity[0]->name}}' word uit het evenement '{{$event[0]->name}}' verwijdert met alle bijbehorende data.</li>
                            <li>Dit kan niet meer ongedaan gemaakt worden.</li>
                        </ul>
                    </div>
                    <form action="{{ route('activity.destroy') }}" method="post" class="mt-4">
                        @csrf
                        <input type="hidden" name="activity_id" value="{{$activity[0]->id}}">
                        <input type="hidden" name="event_id" value="{{$event[0]->id}}">
                        <button type="submit" class="btn btn-danger">Verwijder</button>
                        <a href="{{ route('event.show', ['event_id' => Crypt::encrypt($event[0]->id)]) }}" class="btn btn-info">Annuleer</a>
                    </form>
                </div>
            </div>
            
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
