<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '(dari db)';

require_once '../connection.php';

// add pro
if (isset($_POST['add_product'])) {
    $nama_menu = $_POST['nama_menu'];
    $desc_menu = $_POST['desc_menu'];
    $harga_menu = (int)$_POST['harga_menu'];
    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
    $product_img = file_get_contents($_FILES['product_img']['tmp_name']);
    } else {
        $message[] = 'Gambar produk wajib diunggah.';
        exit;
    }


    $stmt = $conn->prepare("INSERT INTO `menu` (nama_menu, desc_menu, harga_menu, product_img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssib", $nama_menu, $desc_menu, $harga_menu, $null);
    $stmt->send_long_data(3, $product_img);

    if ($stmt->execute()) {
        $message[] = 'Product added successfully';
    } else {
        $message[] = 'Could not add the product';
    }

    $stmt->close();
}

// delete pro
if (isset($_GET['delete'])) {
    $delete_id_menu = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM `menu` WHERE id_menu = ?");
    $stmt->bind_param("i", $delete_id_menu);

    if ($stmt->execute()) {
        $message[] = 'Product has been deleted';
    } else {
        $message[] = 'Product could not be deleted';
    }

    $stmt->close();
    header('Location: index.php');
    exit;
}

// update pro
if (isset($_POST['update_product'])) {
    $update_id_menu = (int)$_POST['update_id_menu'];
    $update_name = $_POST['update_nama_menu'];
    $update_desc = $_POST['update_desc_menu'];
    $update_harga_menu = (int)$_POST['update_harga_menu'];

    // ini biar update ga harus masukin foto
    if (!empty($_FILES['update_product_img']['tmp_name'])) {
        $update_product_img = file_get_contents($_FILES['update_product_img']['tmp_name']);
    } else {
        $update_product_img = base64_decode($_POST['gambar_lama']);
    }

    $stmt = $conn->prepare("UPDATE `menu` SET nama_menu = ?, desc_menu = ?, harga_menu = ?, product_img = ? WHERE id_menu = ?");
    $stmt->bind_param("ssibi", $update_name, $update_desc, $update_harga_menu, $null, $update_id_menu);
    $stmt->send_long_data(3, $update_product_img);

    if ($stmt->execute()) {
        $message[] = 'Product updated successfully';
    } else {
        $message[] = 'Product could not be updated';
    }

    $stmt->close();
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="/ketjeh/admin/style/admin.css">
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message auto-hide"><span>' . $msg . '</span><i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    }
}
?>

<?php include './pages/header.php'; ?>

<div class="container">

<section>
<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a New Product</h3>
   <input type="text" name="nama_menu" placeholder="Enter the product name" class="box" required>
   <input type="text" name="desc_menu" placeholder="Enter the product description" class="box" required>
   <input type="number" name="harga_menu" min="0" placeholder="Enter the product harga_menu" class="box" required>
   <input type="file" class="box" name="product_img" accept="image/png, image/jpg, image/jpeg" required>
   <input type="submit" value="Add the product" name="add_product" class="btn">
</form>
</section>

<section class="display-product-table">

   <table>
      <thead>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Product Description</th>
         <th>Product Price</th>
         <th>Action</th>
      </thead>
      <tbody>
         <?php
         $result = $conn->query("SELECT * FROM `menu`");
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $imageData = base64_encode($row['product_img']);
         ?>
         <tr>
            <td><img src="data:image/jpeg;base64,<?php echo $imageData; ?>" height="100" alt=""></td>
            <td><?php echo $row['nama_menu']; ?></td>
            <td><?php echo $row['desc_menu']; ?></td>
            <td>Rp <?php echo $row['harga_menu']; ?></td>
            <td>
               <a href="index.php?delete=<?php echo $row['id_menu']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"><i class="fas fa-trash"></i> Delete</a>
               <a href="index.php?edit=<?php echo $row['id_menu']; ?>" class="option-btn"><i class="fas fa-edit"></i> Update</a>
            </td>
         </tr>
         <?php
             }
         } else {
             echo "<div class='empty'>No product added</div>";
         }
         ?>
      </tbody>
   </table>
</section>

<section class="edit-form-container">
<?php
if (isset($_GET['edit'])) {
    $edit_id_menu = (int)$_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM `menu` WHERE id_menu = ?");
    $stmt->bind_param("i", $edit_id_menu);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fetch_edit = $result->fetch_assoc();
        $imageData = base64_encode($fetch_edit['product_img']);
?>
<form action="" method="post" enctype="multipart/form-data">
   <img src="data:image/jpeg;base64,<?= $imageData ?>" height="200" alt="">

   <input type="hidden" name="update_id_menu" value="<?= $fetch_edit['id_menu'] ?>">
   <input type="hidden" name="gambar_lama" value="<?= base64_encode($fetch_edit['product_img']) ?>">
   <input type="text" class="box" required name="update_nama_menu" value="<?= $fetch_edit['nama_menu'] ?>">
   <input type="text" class="box" required name="update_desc_menu" value="<?= $fetch_edit['desc_menu'] ?>">
   <input type="number" min="0" class="box" required name="update_harga_menu" value="<?= $fetch_edit['harga_menu'] ?>">
   <!-- biar ga masukin fot lagi pas update -->
   <input type="file" class="box" name="update_product_img" accept="image/png, image/jpg, image/jpeg">
   <input type="submit" value="Update the product" name="update_product" class="btn">
   <input type="reset" value="Cancel" id="close-edit" class="option-btn">
</form>

<?php
    }
    echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
    $stmt->close();
}
?>
</section>

</div>

<script src="/ketjeh/admin/js/script.js"></script>

</body>
</html>
