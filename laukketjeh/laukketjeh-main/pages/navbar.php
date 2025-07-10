<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cart_count = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT COUNT(*) AS total_item FROM cart WHERE user_id = $user_id");
    $data = mysqli_fetch_assoc($res);
    $cart_count = $data['total_item'];
}


?>

<!-- start header  -->
    <div class="header sticky-top top-0 start-0 w-100" style="z-index: 1030;">
    <nav class="navbar navbar-expand-lg py-0 navbar-custom">
        <div class="container px-4 d-flex justify-content-between align-items-center">

            <a href="#"><img src="img/logo11.png" class="img-navbar" alt="disini logo"></a>

            <!-- Mobile Login Register -->
            <div class="d-flex align-items-center d-lg-none">

                <a href="pages/cart.php" class="me-2">
                    <button class="btn btn-sm text-white" style="background-color: #28a745;" type="button">
                        <i class="fa-solid fa-cart-shopping"></i> <?= $cart_count ?>
                    </button>
                </a>
                
                <div class="d-flex gap-2">
                    <?php if (isset($_SESSION['username'])): ?>
                    <a href="pages/logout.php">
                        <button class="btn btn-sm rounded-0 text-white" style="background-color: red;" type="button">Logout</button>
                    </a>
                    <?php else: ?>
                        <a href="pages/login.php">
                            <button class="btn btn-sm rounded-0 text-white" type="button" style="background-color: #ffb72b;">login</button>
                        </a>
                    <?php endif; ?>
                    <a href="pages/login.php">
                        
                    </a>
                </div>

                <button class="navbar-toggler border-0 ms-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#top-navbar" aria-controls="top-navbar">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <!-- start offcanvas menu -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="top-navbar" aria-labelledby="top-navbarLabel">
                <!-- hamburger -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#top-navbar" aria-controls="top-navbar">
                    <div class="d-flex justify-content-between p-3">
                        <img src="img/logo11.png" class="img-navbar" alt="ini logo">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </button>

                <ul class="navbar-nav justify-content-center p-2">
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="#">home</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="#customer">customer</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="#menu">menu</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="#promo">promo</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="https://wa.me/6281381389695?" target="_blank">contact</a></li>
                </ul>
            </div>
            <!--end offcanvas menu-->

            <!-- desktop login register -->
            <div class="login-register d-none d-grid gap-2 d-lg-flex justify-content-center justify-content-md-end">
                <a href="pages/cart.php">
                    <button class="btn me-md-1 text-white" style="background-color: #28a745;" type="button">
                        <i class="fa-solid fa-cart-shopping"></i> Cart <?= $cart_count ?>
                    </button>
                </a>

                <?php if (isset($_SESSION['username'])): ?>
                    <a href="pages/logout.php">
                        <button class="btn me-md-1 text-white" style="background-color: red;" type="button">Logout</button>
                    </a>
                <?php else: ?>
                    <a href="pages/login.php">
                        <button class="btn me-md-1 text-white" style="background-color: #ffb72b;" type="button">Login</button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
<!-- end header  -->