@component('mail::message')
# Opgegeven activiteiten.

{{ Auth::user()->name }}, Hier ziet u een overzicht van de door jouw opgegeven activiteiten voor evenement:
{{ $mailInfo[1]->event->name }}

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
                <td>{{ $info->activity->name }}</td>
                <td>{{ $info->round_id }}</td>
                <td>{{ $info->round->start_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endcomponent
