<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
</head>
<body>
    <p>Hai Pelanggan Simseka, {{ $user->name }},</p>
    <p>Terima kasih telah registrasi di simseka. Tolong klik link dibawah ini untuk konfirmasi email kamu! :</p>
    <a href="{{ $confirmationLink }}">Konfirmasi Email</a>
    <p>Jika kamu tidak merasa registrasi di simseka, tolong tolak email ini.</p>
</body>
</html>