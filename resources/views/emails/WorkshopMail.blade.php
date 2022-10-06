@component('mail::message')
# Inschrijvingen workshop

Beste {{$mailInfo[0]->workshophouder}},
<br>
Het inschrijven is gesloten, hier is een lijst met alle aanmeldingen van uw workshop: {{$mailInfo[0]->activity}}

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
    @foreach ($mailInfo as $info)
      <tr>
        <td>{{$info->round_id}}</td>
        <td>{{$info->start_time}}</td>
        <td>{{$info->end_time}}</td>
        <td>{{$info->name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endcomponent