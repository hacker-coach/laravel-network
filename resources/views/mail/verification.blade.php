Message: {{  (string)$logMessage }}

MAIL: {{ $user->email }}

{{ route('indexVerification',$user->id) }}

