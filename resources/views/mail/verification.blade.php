Message: {{  (string)$logMessage }}

MAIL: {{ $user->email }}

{{ route('verificationVerification',$user->id) }}

