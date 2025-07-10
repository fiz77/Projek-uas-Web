<?php
require_once 'connection.php';
$sql = "SELECT * FROM menu";
$all_product = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lauk Ketjeh</title>
    <link rel="icon" type="image/x-icon" href="img/logo_tittle.png">

    <!--link bootstrap 5.3-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
    <!--link CSS-->
    <link rel="stylesheet" href="style/tes.css">

    <!--link lineicons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>

<!-- start header  -->
    <div class="header sticky-top top-0 start-0 w-100" style="z-index: 1030;">
    <nav class="navbar navbar-expand-lg py-0 navbar-custom">
        <div class="container px-4 d-flex justify-content-between align-items-center">

            <a href="#"><img src="img/logo11.png" class="img-navbar" alt="disini logo"></a>

            <!-- Mobile Login Register -->
            <div class="d-flex align-items-center d-lg-none">
                
                <div class="d-flex gap-2">
                    <a href="pages/login.html">
                        <button class="btn btn-sm rounded-0 text-white" type="button" style="background-color: #ffb72b;">login</button>
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
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="index.php?p=home">home</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="index.php?p=about">about</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="index.php?p=company">company</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="index.php?p=blog">blog</a></li>
                    <li class="nav-item px-3 px-lg-0 py-1 py-lg-3"><a class="nav-link" href="index.php?p=contact">contact</a></li>
                </ul>
            </div>
            <!--end offcanvas menu-->

            <!-- desktop login register -->
            <div class="login-register d-none d-grid gap-2 d-lg-flex justify-content-center justify-content-md-end">
                <a href="pages/login.html">
                    <button class="btn me-md-1 text-white" style="background-color: #ffb72b;" type="button">login</button>
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- end header  -->

<!-- start Hero Carousel -->
  <div class="hero-carousel position-relative">
    <div class="list-hero">

      <div class="item">
        <img src="img/carausel/1.png" class="img-fluid" />
        <div class="content text-white text-start">
          <div class="author text-uppercase">Lauk ketjeh</div>
          <div class="title display-4 fw-bold">menu ketjeh</div>
          <div class="topic display-5 fw-bold ">nasi tumpeng</div>
          <p class="des small">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam.
          </p>
          <div class="buttons mt-3">
            <button class="btn btn-light text-uppercase fw-semibold">See More</button>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="img/carausel/2.png" class="img-fluid" />
        <div class="content text-white text-start">
          <div class="author text-uppercase">Lauk ketjeh</div>
          <div class="title display-4 fw-bold">menu ketjeh</div>
          <div class="topic display-5 fw-bold ">nasi tumpeng</div>
          <p class="des small">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam.
          </p>
          <div class="buttons mt-3">
            <button class="btn btn-light text-uppercase fw-semibold">See More</button>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="img/carausel/3.png" class="img-fluid" />
        <div class="content text-white text-start">
          <div class="author text-uppercase">Lauk ketjeh</div>
          <div class="title display-4 fw-bold">menu ketjeh</div>
          <div class="topic display-5 fw-bold ">nasi tumpeng</div>
          <p class="des small">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam.
          </p>
          <div class="buttons mt-3">
            <button class="btn btn-light text-uppercase fw-semibold">See More</button>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="img/carausel/4.png" class="img-fluid" />
        <div class="content text-white text-start">
          <div class="author text-uppercase">Lauk ketjeh</div>
          <div class="title display-4 fw-bold">menu ketjeh</div>
          <div class="topic display-5 fw-bold ">nasi tumpeng</div>
          <p class="des small">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam.
          </p>
          <div class="buttons mt-3">
            <button class="btn btn-light text-uppercase fw-semibold">See More</button>
          </div>
        </div>
      </div>

    </div>

    <!-- Thumbnails -->
    <div class="thumbnail d-flex justify-content-center gap-3 px-3">
      <div class="item text-white text-center">
        <img src="img/carausel/1.png" />
        <div class="content">
          <div class="title">VARIANS</div>
          <div class="description">Description</div>
        </div>
      </div>

      <div class="item text-white text-center">
        <img src="img/carausel/2.png" />
        <div class="content">
          <div class="title">VARIANS</div>
          <div class="description">Description</div>
        </div>
      </div>

      <div class="item text-white text-center">
        <img src="img/carausel/3.png" />
        <div class="content">
          <div class="title">VARIANS</div>
          <div class="description">Description</div>
        </div>
      </div>

      <div class="item text-white text-center">
        <img src="img/carausel/4.png" />
        <div class="content">
          <div class="title">VARIANS</div>
          <div class="description">Description</div>
        </div>
      </div>

    </div>

    <!-- Arrows -->
    <div class="arrows d-flex justify-content-center gap-2 mt-3">
      <button id="prev" class="btn btn-light rounded-circle">&lt;</button>
      <button id="next" class="btn btn-light rounded-circle">&gt;</button>
    </div>

    <!-- Time Running Bar -->
    <div class="time bg-warning position-absolute top-0 start-0"></div>
  </div>
<!-- end Hero Carousel -->

<!-- start lauk ketjeh customer  -->
<section class="customer-carousel-section">
  <div class="container position-relative">
    <h2 class="customer-carousel-title">Lauk Ketjeh Bersama Customer</h2>

    <!-- Carousel Items -->
    <div id="customerCarousel" class="customer-carousel-container">
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
      <div class="customer-carousel-item">
        <img src="img/carausel/2.png" alt="Customer 1" class="customer-carousel-image">
        <div class="customer-carousel-name">Customer 1</div>
      </div>
    </div>

    <!-- Prev / Next Buttons -->
    <div class="customer-carousel-controls">
      <button class="customer-carousel-button" onclick="scrollCustomerCarousel(-1)">
        &#x276E;
      </button>
      <button class="customer-carousel-button" onclick="scrollCustomerCarousel(1)">
        &#x276F;
      </button>
    </div>

  </div>
</section>
<!-- end lauk ketjeh customer  -->

<!-- start sidebar product  -->
<div class="pt-4" style="background: #fbbc34;">

  <div class="menu-catering-container shadow-xl">

    <div class="sticky-header text-center">
        <h2 class="tittle fw-bold text-black">Menu Catering</h2>
      </div>


<!-- start sidebar product  -->

    <div class="sidebar-mobile d-block d-md-none">
      <div class="widget p-4">
        <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;">Nasi Kotak</a>
        <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;">Tumpeng & Liwetan</a>
        <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;">Nasi Ayam</a>
      </div>
    </div>

    <div class="wrap" >
       <div class="sidebar-btn">
          <div class="widget p-4">
            <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;" >Nasi Kotak</a>
            <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;" >Tumpeng & Liwetan</a>
            <a href="#" class="btn w-100 fw-bold text-start text-white mb-2" style="background-color: #2C7B3F;" >Nasi Ayam</a>
          </div>
        </div>     

      <main>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
        $imageData = base64_encode($row["product_img"]);
        $imageSrc = 'data:image/jpeg;base64,'. $imageData;
        ?>

          <div class="col">
            <div class="card product-card text-white mb-4 mt-2 shadow">
              <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="img">
              <div class="card-body d-flex flex-column">
                <h6 class="fw-bold"><?php echo $row["nama_menu"]; ?></h6>
                <p class="text-white small mb-2"><?php echo $row["desc_menu"]; ?></p>
                <div class="mt-auto d-flex justify-content-between align-items-center">
                  <span class="fw-bold">Rp. <?php echo $row["harga_menu"]; ?></span>
                  <a href="#" class="btn btn-sm btn-warning">Add</a>
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

<!-- start iklan promo -->
<div class="add overflow-hidden">
  <img src="img/ads.jpg" class="img-fluid w-100 ads-img" alt="iklan_image">
</div>
<!-- end iklan promo -->

<!-- start testimoni -->
<div class="position-relative overflow-hidden d-flex justify-content-center align-items-center" style="height: 500px;">
  <img src="img/backgorund_testimoni.jpg" class="img-fluid w-100 h-100 position-absolute" style="filter: blur(5px); object-fit: cover; z-index: -1;" alt="testimoni_background" />
  <div id="carouselTestimoni" class="carousel slide w-100 h-100" data-bs-ride="carousel" style="max-width: 1200px;">

    <div class="carousel-inner h-100 d-flex align-items-center">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-3 px-3">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <div class="mb-2 text-warning">★★★★★</div>
                  <p class="card-text">"Pelayanannya cepat dan makanannya enak banget. Anak-anak juga suka. Terima kasih banyak!"</p>
                  <strong>Kak Niesa</strong>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimoni" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimoni" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>
</div>
<!-- end testimoni -->

<!-- start footer -->
<footer class="py-5" style="background: #EEEDED;">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-3 mb-4">
        <a href="#" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
          <img src="img/logo11.png" alt="">
        </a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A adipisci ratione minima non voluptatem aliquam quas obcaecati cum sequi maxime dignissimos, est incidunt tempore reiciendis ad expedita in eaque cumque.</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-2 mb-4">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
      <div class="col-6 col-md-2 mb-4">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-3 mb-4">
        <h5>Maps</h5>
        <div class="google-map">
        <iframe width="300" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=lauk+ketjeh&t=k&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>

    </div>

    <div class="d-flex justify-content-between py-5 my-4 border-top">
      <p>© 2025 <a target="_blank" href="https://www.instagram.com/lauk_ketjeh/">Lauk Ketjeh</a> All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3">
          <a class="link-dark" href="#">
            <i class="fa-brands fa-instagram" width="40" height="40"></i>
          </a>
        </li>
        <li class="ms-3">
          <a class="link-dark" href="#">
            <i class="fa-brands fa-instagram" width="40" height="40"></i>
          </a>
        </li>
        <li class="ms-3">
          <a class="link-dark" href="#">
            <i class="fa-brands fa-instagram" width="40" height="40"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</footer>
<!-- end footer -->

    <!--carausel js-->
    <script src="./js/carrausel.js"></script>

    <!--navbar js-->
    <script src="./js/scrolled_navbar.js"></script>

    <!-- lauk ketjeh bersama customer -->
    <script>
    function scrollCustomerCarousel(direction) {
      const container = document.getElementById("customerCarousel");
      const scrollAmount = container.offsetWidth * 0.5;
      container.scrollBy({
        left: direction * scrollAmount,
        behavior: "smooth",
      });
    }
    </script>

    <!--Bootstrap Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    <!--script fontawesome-->
    <script src="https://kit.fontawesome.com/5e0fafd318.js" crossorigin="anonymous"></script>

  </body>
</html>