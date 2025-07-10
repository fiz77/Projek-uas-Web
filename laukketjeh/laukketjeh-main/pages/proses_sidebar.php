<?php
session_start();

require_once '../connection.php';

$category = $_GET['category'];

$stmt = $conn->prepare("SELECT * FROM menu WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $imageData = base64_encode($row["product_img"]);
    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
    ?>

    <div class="col-md-4">
      <div class="card product-card text-white mb-4 mt-2 shadow">
        <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="img">
        <div class="card-body d-flex flex-column">
          <h6 class="fw-bold"><?php echo $row["nama_menu"]; ?></h6>
          <p class="text-white small mb-2"><?php echo $row["desc_menu"]; ?></p>
          <div class="mt-auto d-flex justify-content-between align-items-center">
            <span class="fw-bold">Rp. <?php echo $row["harga_menu"]; ?></span>
            <?php if (isset($_SESSION['user_id'])): ?>
              <a href="pages/add_to_cart.php?id=<?= $row['id_menu'] ?>" class="btn btn-sm btn-warning">Add</a>
            <?php else: ?>
              <button onclick="alert('Silakan login terlebih dahulu untuk menambahkan ke keranjang!')" class="btn btn-sm btn-warning">Add</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <?php
}
?>
