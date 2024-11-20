<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Success</title>
</head>
<body>
    <h3>Halo, {{ $user->name }}</h3>
    <p>Akun Anda berhasil dibuat dengan email {{ $user->email }} pada {{ $user->created_at }}.</p>
    <p>Terima kasih telah melakukan registrasi!</p>
</body>
</html>
