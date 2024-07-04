<h4>Hi {{ $name }}</h4>
Please verify your email with below link :
<a href="{{ route('verify-email', ['token' => $token]) }}">Verify Email</a>
