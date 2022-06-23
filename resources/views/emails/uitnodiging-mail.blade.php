@component('mail::message')
# Aanmelden Lifestyledag
Hierbij de uitnodiging of u mee wilt doen aan de Lifestyledag 2022 in Gorinchem. 
<br>
Wilt u meehelpen? Klik op de onderstaande link om de uitnodiging te accepteren en u aan te melden.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/aanmelden', 'color' => 'success'])
Aanmelden
@endcomponent

@endcomponent