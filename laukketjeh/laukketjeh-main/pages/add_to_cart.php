<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    echo "<script>alert('Anda harus login sebagai user untuk menambahkan ke cart'); window.location.href='../pages/login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $id_menu = (int) $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = $id_menu");

    if (!$result) {
        die("Query gagal: " . mysqli_error($conn));
    }

    $menu = mysqli_fetch_assoc($result);

    if (!$menu) {
        die("Produk tidak ditemukan!");
    }

    $cek = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = $user_id AND id_menu = $id_menu");

    if (mysqli_num_rows($cek) > 0) {
        
        mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND id_menu = $id_menu");
    } else {
        
        mysqli_query($conn, "INSERT INTO cart (user_id, id_menu, quantity) VALUES ($user_id, $id_menu, 1)");
    }
}

header('Location: ../index.php');
exit;
?>
