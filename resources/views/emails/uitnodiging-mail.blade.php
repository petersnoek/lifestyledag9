@component('mail::message')
Beste {{ $user->name }},
Wij organiseren weer een Lifestyledag op {{ $date }} in Gorinchem.
Wilt u meehelpen? Vul dan dit formulier in.

<!-- Placeholder voor activiteit -->
<p><label for="Activiteit">Activiteit:</label></p>
  <textarea id="Activiteit" name="Activiteit" rows="1" cols="20"></textarea>
<br>

<!-- Placeholder voor beschrijving -->
<p><label for="Beschrijving">Beschrijving:</label></p>
  <textarea id="Beschrijving" name="Beschrijving" rows="4" cols="50"></textarea>
<br>

<!-- Placeholder voor capaciteit -->
<p><label for="Capaciteit">Capaciteit:</label></p>
  <textarea id="Capaciteit" name="Capaciteit" rows="1" cols="20"></textarea>
<br>

{{ config('app.name') }}
@endcomponent
