@component('mail::message')
Beste {{ $user->name }},
Wij organiseren weer een Lifestyledag op {{ $date }} in Gorinchem.
Wilt u meehelpen? Klik op de onderstaande link om de uitnodiging te accepteren.

@component('mail::button', ['url' => 'http://lifestyledag9.uitnodiging', 'color' => 'success'])
Uitnodiging Lifestyledag
@endcomponent

{{ config('app.name') }}
@endcomponent
