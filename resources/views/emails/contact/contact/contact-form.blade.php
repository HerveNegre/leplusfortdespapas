@component('mail::message')

# Merci pour votre message !

<b>Prénom</b> {{ $mail['name'] }}
<b>Adresse email</b> {{ $mail['email'] }}
<b>Objet</b> {{ $mail['objet'] }}

<b>Message</b>

{{ $mail['message'] }}

@endcomponent
