@component('mail::message')
# Inschrijvingen workshop

Beste {{$userInfo[0]->workshophouder}},
<br>
Het inschrijven is gesloten, hier is een lijst met alle aanmeldingen van uw workshop: {{$userInfo[0]->activity}}

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
        <td>{{$info->round->round}}</td>
        <td>{{$info->round->start_time}}</td>
        <td>{{$info->round->end_time}}</td>
        <td>{{$Info->name}}</td>
      </tr>
    @endforeach
    {{$studentInfo[0]->name}}
  </tbody>
</table>
@endcomponent