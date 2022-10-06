@component('mail::message')
# Inschrijvingen workshop

Het inschrijven is gesloten, hier is een lijst met alle aanmeldingen van uw workshop:

<table class="table">
  <thead>
    <tr>
      <th scope="col">Ronde</th>
      <th scope="col">Naam</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mailInfo as $info)
      <tr>
        <td>{{$info->round_id}}</td>
        <td>{{$info->name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endcomponent