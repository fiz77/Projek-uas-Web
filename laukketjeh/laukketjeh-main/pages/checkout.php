<?php
session_start();
require_once '../connection.php';

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User belum login.");
}

$cart_query = mysqli_query($conn, "
    SELECT c.id_menu, c.quantity, m.nama_menu, m.harga_menu
    FROM cart c
    JOIN menu m ON c.id_menu = m.id_menu
    WHERE c.user_id = '$user_id'
");

if (mysqli_num_rows($cart_query) === 0) {
    echo "<script>alert('Keranjang kosong.'); window.location.href='cart.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_hp  = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $grand_total = 0;
    $items = [];

    mysqli_data_seek($cart_query, 0);
    while ($row = mysqli_fetch_assoc($cart_query)) {
        $sub = $row['harga_menu'] * $row['quantity'];
        $grand_total += $sub;
        $items[] = $row;
    }

    mysqli_query($conn, "INSERT INTO orders (user_id, order_date, nama_penerima, no_hp, alamat_lengkap) 
        VALUES ('$user_id', NOW(), '$nama', '$no_hp', '$alamat')");

    $order_id = mysqli_insert_id($conn);

    foreach ($items as $item) {
        $menu_id = $item['id_menu'];
        $qty     = $item['quantity'];
        $total   = $item['harga_menu'] * $qty;

        mysqli_query($conn, "INSERT INTO order_item (order_id, id_menu, jml_order, total_harga)
            VALUES ('$order_id', '$menu_id', '$qty', '$total')");
    }

    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");

    $wa_message = "*Pesanan Anda:*\nNama: $nama\nHP: $no_hp\nAlamat: $alamat\n\n";
    foreach ($items as $item) {
        $wa_message .= "- {$item['nama_menu']} ({$item['quantity']}x) = Rp " . number_format($item['harga_menu'] * $item['quantity']) . "\n";
    }
    $wa_message .= "\n*Total: Rp " . number_format($grand_total) . "*";

    $wa_url = "https://wa.me/6281381389695?text=" . urlencode($wa_message);
    $_SESSION['last_wa_url'] = $wa_url;
    header("Location: sukses.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukkan Hanya No Telpehon" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamatt lengkap Anda" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim ke WhatsApp & Simpan</button>
    </form>
</div>
</body>
</html>
