@component('mail::message')
Geachte gebruiker van Lifestyledag,

Er is voor u een workshophouder account aangemaakt. U kunt nu inloggen met:

<b>Email:</b> {{$mailInfo['userEmail']}}<br>
<b>Wachtwoord:</b> {{$mailInfo['password']}}

Klik op onderstaande button om direct naar de inlogpagina te gaan
@component('mail::button', ['url' => $mailInfo['url'], 'color' => 'success'])
inloggen
@endcomponent

Met vriendelijke groet,

Uw Lifestyledag beheerder

@if(isset($mailInfo['url']))
@component('mail::subcopy')
Als u problemen ondervindt bij het klikken op de knop 'inloggen', kopieert en plakt u de onderstaande URL in uw webbrowser: <a href="{{$mailInfo['url']}}" class="break-all">{{$mailInfo['url']}}</a>
@endcomponent
@endif

@endcomponent
