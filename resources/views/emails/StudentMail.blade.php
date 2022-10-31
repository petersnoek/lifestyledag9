@component('mail::message')
# Opgegeven activiteiten.

{{-- {{ Auth::user()->name }}, Hier ziet u een overzicht van de door jouw opgegeven activiteiten voor evenement:
{{ $mailInfo[1]->event->name }} --}}

<table class="table" style="border-spacing: 20px">
    <thead>
        <tr>
            <th scope="col"> Activiteit </th>
            <th scope="col"> Ronde </th>
            <th scope="col"> Starttijd </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mailInfo as $info)
            <tr>
                <td>{{ $info->student }}</td>
            </tr>
        @endforeach

        @foreach ($activityInfo as $activity)
        <tr>
            <td>{{ $activity->rounds }}</td>
            <td>{{ $activity->start_time }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endcomponent