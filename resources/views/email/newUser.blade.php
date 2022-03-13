@component('mail::message')
Bonjour {{ $user->first_name }} {{ $user->last_name }},<br>
Nous vous confirmons que votre compte a été crée.
Votre nom d'utilisateur est {{ $user->email }}
Le lien pour accéder au portail est:<a href="{{ config('app.url') }}">sinforec.gouvsn.org</a>

Merci <br>
Sinforec Admin
@endcomponent
