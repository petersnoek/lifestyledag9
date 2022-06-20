<table class="table">
  <thead>
    <tr>
      <th scope="col">Aanmeldingen</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($aanmeldingen as $aanmelding)
    <tr>
      <td><p>{{$aanmelding->activiteit}}</p></td>
      <td><p>{{$aanmelding->beschrijving}}</p></td>
      <td><p>{{$aanmelding->ronde}}</p></td>
      <td><p>{{$aanmelding->capaciteit}}</p></td>
    </tr>
    @endforeach
    
    @if (count($aanmeldingen) == 0)
      <tr>
        <td colspan="6">Geen aanmeldingen gevonden</td>
      </tr>
    @endif
  </tbody>
</table>
