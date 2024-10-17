<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ussc Notification</title>
</head>
<body>
    <h1>Pemesanan Lapangan Diterima</h1>
    <p>Halo admin,</p>
    <p>Ada booking lapangan masuk !</p>
    <p>Detail Pemesanan:</p>
    <ul>
        <li>Lapangan: {{ $lapangan }}</li>
        <li>Tanggal: {{ $tanggal }}</li>
        <li>Jam: {{ implode(', ', $jam) }}</li>
        <li>Kontak: {{ $phone_number }}</li>
    </ul>
    <p>Status pemesanan Anda saat ini adalah: PENDING.</p>
</body>
</html>
