@component('mail::message')
# Inschrijvingen workshop

Beste {{$mailInfo["workshophouder"]}},
<br>
Het inschrijven is gesloten, hier is een lijst met alle aanmeldingen van uw workshop:
{{$mailInfo["activity"]}}

<table class="table" style="border-spacing: 20px;">
<thead>
<tr>
<th scope="col">Ronde</th>
<th scope="col">Starttijd</th>
<th scope="col">Eindtijd</th>
<th scope="col">Student</th>
</tr>
</thead>
<tbody>
@foreach ($mailInfo["eventrounds"] as $eventround)

@foreach ($eventround->enlistments()->get() as $enlistment)
<?php $student = $enlistment->user()->first(); ?>
<tr>
<td>{{$eventround->round}}</td>
<td>{{$eventround->start_time}}</td>
<td>{{$eventround->end_time}}</td>
<td>{{$student->first_name . ' ' . $student->insertion . ' ' . $student->last_name}}</td>
</tr>
@endforeach

@endforeach
</tbody>
</table>
@endcomponent