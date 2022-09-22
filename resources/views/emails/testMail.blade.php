@component('mail::message')
# Aanmelden Lifestyledag
Hierbij de uitnodiging of u mee wilt doen aan de Lifestyledag 2022 in Gorinchem. 
<br>
Wilt u meehelpen? Klik op de onderstaande link om de uitnodiging te accepteren en u aan te melden.

@component('mail::button', ['url' => $mailInfo['url'], 'color' => 'success'])
Aanmelden
@endcomponent

@endcomponent
