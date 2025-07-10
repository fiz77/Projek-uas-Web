
    <!--page dynamic-->
    <?php include 'pages/head.php'; ?>
    <?php include 'pages/navbar.php'; ?>
    
    <?php if (isset($_SESSION['flash'])): ?>
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="margin: 0 15px;">
        <?= $_SESSION['flash']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php unset($_SESSION['flash']); endif; ?>

    <?php include 'pages/hero.php'; ?>
    <?php include 'pages/customer.php'; ?>
    <?php include 'pages/menu.php'; ?>
    <?php include 'pages/ads.php'; ?>
    <?php include 'pages/testimoni.php'; ?>
    <?php include 'pages/footer.php'; ?>

    

    <!--carausel js-->
    <script src="./js/carrausel.js"></script>

    <!--filter card menu js-->
    <script>
      function filtercategory(category) {
        fetch('/ketjeh/pages/proses_sidebar.php?category=' + category)
          .then(response => response.text())
          .then(html => {
            document.getElementById('card-container').innerHTML  = html;
          });
      }
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll('.widget .btn');

        links.forEach(link => {

          if (link.classList.contains('active')) {
            link.style.backgroundColor = '#ffb72b';
            link.style.color = 'black';
          }

          link.addEventListener('click', function (e) {
            e.preventDefault();

            links.forEach(l => {
              l.classList.remove('active');
              l.style.backgroundColor = '#2C7B3F';
              l.style.color = 'white';
            });

            this.classList.add('active');
            this.style.backgroundColor = '#ffb72b';
            this.style.color = 'black';
          });
        });
      });
    </script>




    
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