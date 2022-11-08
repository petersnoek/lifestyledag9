@component('mail::message')

# Opgegeven activiteiten.
{{ $mailInfo["student"] }}, Hier is het overzicht van de door jouw opgegeven activiteiten.

<table class="table" style="border-spacing: 20px">
<thead>
<tr>
<th scope="col"> Activiteit </th>
<th scope="col"> Ronde </th>
<th scope="col"> Starttijd </th>
</tr>
</thead>
<tbody>

@foreach ($activityInfo as $activity)
<tr>
<td>{{ $activity["activity"] }}</td>
<td>{{ $activity["rounds"] }}</td>
<td>{{ $activity["start_time"] }}</td>
</tr>
@endforeach
</tbody>
</table>
@endcomponent