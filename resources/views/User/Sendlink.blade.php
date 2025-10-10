Hello Mr/Ms. {{ $data1['username'] }}
<br>
Your account has been created successfully. Please verify your email to activate your account.
<br>
<a href="http://127.0.0.1:8000/sendlink_action/{{ $data1['email'] }}/{{ $data1['token'] }}">Click here to verify your
    email.</a>
<br>