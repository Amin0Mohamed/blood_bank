@component('mail::message')
#thank you for your message
<strong>Name:</strong> {{ $data['name'] }}
<br>
<strong>email:</strong> {{ $data['email'] }}

<strong>message</strong>

{{ $data['messageText'] }}
@endcomponent
