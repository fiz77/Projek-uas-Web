<?php
session_start();
$wa_url = $_SESSION['last_wa_url'] ?? '../index.php';
unset($_SESSION['last_wa_url']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <h1 class="text-success">✅ Pesanan Anda Berhasil!</h1>
    <p class="lead">Silakan lanjutkan proses melalui WhatsApp.</p>

    <a href="<?= $wa_url ?>" target="_blank" class="btn btn-success btn-lg mb-3">
        Kirim Pesan WhatsApp Sekarang
    </a>

    <br>
    <a href="../index.php" class="btn btn-outline-primary">Kembali ke Beranda</a>
</div>
</body>
</html>
