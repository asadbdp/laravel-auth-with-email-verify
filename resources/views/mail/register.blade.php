Name: {{ $MailContent['name'] }} <br>
E-mail: {{ $MailContent['email'] }}
<br><br><br>
<a href="{{ route('user.email.verify', $MailContent['token']) }}">Email Verify</a>