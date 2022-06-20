@component('mail::message')
# Uitnodiging voor de lifestyledag
Hierbij de uitnodiging of u mee wilt doen aan de Lifestyledag 2022 in Gorinchem. 
<br>
Wilt u meehelpen? Klik op de onderstaande link om de uitnodiging te accepteren.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/aanmelden', 'color' => 'success'])
Uitnodiging Lifestyledag
@endcomponent
