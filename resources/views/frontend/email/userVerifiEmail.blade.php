<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Link</title>
</head>
<body>

<h>Hello {{ $user->name }}</h>

<p>
    we are proude that your are now our user ,, if you want to more speacial content please Verify your email
    <a class="btn btn-primary" href="{{ route('verify.user', $user->email_verification_token) }}">Verifi</a>
</p>

<h3>Thank you</h3>


</body>
</html>
