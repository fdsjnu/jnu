Click here to reset your password: <a href="{{ $link = url('passwordnew/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
