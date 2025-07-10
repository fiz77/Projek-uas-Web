<!-- start sidebar product  -->
<div class="pt-4" style="background: #fbbc34;" id="menu">

  <div class="menu-catering-container shadow-xl">

    <div class="sticky-header text-center">
        <h2 class="tittle fw-bold text-black">Menu Catering</h2>
      </div>


<!-- start sidebar product  -->

    <div class="sidebar-mobile d-block d-md-none">
      <div class="widget p-4">
        <a onclick="filtercategory('nasibox')" class="btn w-100 fw-bold text-start text-white mb-2 active" style="background-color: #2C7B3F;">Nasi Box</a>
        <a onclick="filtercategory('tumpeng')" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;">Tumpeng</a>
        <a onclick="filtercategory('snack')" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;">Snack Box</a>
      </div>
    </div>

    <div class="wrap" >
        <div class="sidebar-btn">
          <div class="widget p-4">
            <a onclick="filtercategory('nasibox')" class="btn w-100 fw-bold text-start text-white mb-2 active" style="background-color: #2C7B3F;" >Nasi Box</a>
            <a onclick="filtercategory('tumpeng')" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;" >Tumpeng</a>
            <a onclick="filtercategory('snack')" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;" >Snack Box</a>
          </div>
        </div>     

      <main>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="card-container">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
        $imageData = base64_encode($row["product_img"]);
        $imageSrc = 'data:image/jpeg;base64,'. $imageData;
        ?>

          <div class="col">
            <div class="card product-card text-white mb-4 mt-2 shadow" id="card-container">
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
        </div>
      </main>
    </div>

  </div>

</div>
<!-- end sidebar product  -->