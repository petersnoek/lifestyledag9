<form>
  <h2>Aanmelden Lifestyledag</h2>

  <!-- Placeholder voor activiteit -->
  <p><label for="Activiteit">Activiteit:</label></p>
    <textarea id="Activiteit" name="Activiteit" rows="1" cols="30" style="resize: none;"></textarea>
  <br>

  <!-- Placeholder voor beschrijving -->
  <p><label for="Beschrijving">Beschrijving:</label></p>
   <textarea id="Beschrijving" name="Beschrijving" rows="4" cols="50"></textarea>
  <br>

  <!-- Placeholder voor ronde -->
  <p><label for="Ronde">Aantal rondes:</label></p>
    <textarea id="Ronde" name="Ronde" rows="1" cols="5" style="resize: none;"></textarea>
  <br>

  <!-- Placeholder voor capaciteit -->
  <p><label for="Capaciteit">Maximaal aantal studenten:</label></p>
    <textarea id="Capaciteit" name="Capaciteit" rows="1" cols="5" style="resize: none;"></textarea>
  <br>

  <!-- Afbeelding -->
  <img src=""></img>
  <br>

  <button id="sendInvite" onclick="event.preventDefault(); this.form.submit();">Aanmelding versturen</button>
</form>
