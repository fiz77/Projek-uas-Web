<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../connection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Login dulu untuk melihat product di dalam cart-nya.'); window.location.href = '/ketjeh/pages/login.php';</script>";
    exit;
}


$user_id = $_SESSION['user_id'];

// kuantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cart'], $_POST['qty'])) {
    $id_cart = (int) $_POST['id_cart'];
    $qty = max(1, (int) $_POST['qty']);
    mysqli_query($conn, "UPDATE cart SET quantity = $qty WHERE id_cart = $id_cart AND user_id = $user_id");
    header('Location: cart.php');
    exit;
}

// del item
if (isset($_GET['remove'])) {
    $id_cart = (int) $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE id_cart = $id_cart AND user_id = $user_id");
    header('Location: cart.php');
    exit;
}

// clear cart
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");
    header('Location: cart.php');
    exit;
}

// isi dari sql
$cart_result = mysqli_query($conn, "
    SELECT c.id_cart, c.quantity, m.nama_menu, m.harga_menu, m.desc_menu, m.product_img 
    FROM cart c 
    JOIN menu m ON c.id_menu = m.id_menu 
    WHERE c.user_id = $user_id
");

$count_result = mysqli_query($conn, "SELECT COUNT(*) AS total_item FROM cart WHERE user_id = $user_id");
$count_data = mysqli_fetch_assoc($count_result);
$total_item = $count_data['total_item'];

$cart_items = [];
$grandTotal = 0;
while ($item = mysqli_fetch_assoc($cart_result)) {
    $cart_items[] = $item;
    $grandTotal += $item['harga_menu'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>

    <?php if (!empty($cart_items)) : ?>
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th style="width: 150px;">Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): 
                    $subTotal = $item['harga_menu'] * $item['quantity'];
                ?>
                    <tr>
                        <td>
                            <?php if ($item['product_img']): ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($item['product_img']) ?>" width="60" height="60" alt="produk">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($item['nama_menu']) ?></td>
                        <td><?= htmlspecialchars($item['desc_menu'] ?? '-') ?></td>
                        <td>Rp <?= number_format($item['harga_menu'], 0, ',', '.') ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id_cart" value="<?= $item['id_cart'] ?>">
                                <input type="number" name="qty" class="form-control d-inline" value="<?= $item['quantity'] ?>" style="width: 60px;">
                                <button type="submit" class="btn btn-warning btn-sm mt-1">Update</button>
                            </form>
                        </td>
                        <td>Rp <?= number_format($subTotal, 0, ',', '.') ?></td>
                        <td>
                            <a href="cart.php?remove=<?= $item['id_cart'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini?')">
                                <i class="fa fa-trash"></i> Remove
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="../index.php" class="btn btn-warning w-100">Continue Shopping</a>
                    </td>
                    <td class="fw-bold align-middle">Grand Total</td>
                    <td class="fw-bold align-middle">Rp <?= number_format($grandTotal, 0, ',', '.') ?></td>
                    <td>
                        <a href="checkout.php" class="btn btn-primary w-100">Proceed to Checkout</a>
                    </td>
                    <td colspan="2">
                        <a href="cart.php?delete_all=1" onclick="return confirm('Hapus semua item dari cart?')" class="btn btn-danger w-100">
                            <i class="fa fa-trash"></i> Delete All
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php else : ?>
        <div class="text-center">
            <div class="alert alert-info">Your cart is empty.</div>
            <a href="../index.php" class="btn btn-warning mt-2">
                <i class="fa fa-arrow-left"></i> Kembali ke Menu
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
