@component('mail::message')
Bonjour {{ $user->first_name }} {{ $user->last_name }}
Nous vous confirmons que votre compte a été crée.
Votre nom d'utilisateur est "username of the user".
Le lien pour accéder au portail est:<a href="{{ config('app.url') }}">.

Merci
Sinforec Admin
@endcomponent
