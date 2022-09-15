@component('mail::message')
# Uitnodiging voor de lifestyledag
Hierbij de uitnodiging of je mee wilt doen aan de lifestyle dag 2022. Klik op de onderstaande link om de uitnodiging te accepteren.


@component('mail::button', ['url' => 'http://lifestyledag9.test', 'color' => 'success'])
Uitnodiging
@endcomponent

Bedankt,<br>
{{ config('app.name') }}
@endcomponent
