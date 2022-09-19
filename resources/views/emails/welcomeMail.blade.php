@component('mail::message')
{{ $mailInfo['title'] }}

Congratulations! Your account has been created.

@component('mail::button', ['url' => $mailInfo['url']])
Cheers!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent