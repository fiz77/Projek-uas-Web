<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login Ketjeh</title>

    <!--link bootstrap 5.3-->
    
    <!--link CSS-->
    <link rel="stylesheet" href="../style/login.css">

    <!--link lineicons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
    
    <!--start login dana register-->
    <div class="container">
        <div class="form-box login">
            <form action="/ketjeh/proses_login_register.php" method="POST">
                <h1 style="color: #2C7B3F;">Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required name="username">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required name="psw_user">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" class="btn" value="login" name="login">

                <a href="../index.php" class="btn-back" style="margin-top: 20px;">Kembali ke home</a>

                <p>or login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-google"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="/ketjeh/proses_login_register.php" method="post">
                <h1 style="color: #2C7B3F;">Registration</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required name="username">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" required name="email_user">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required name="psw_user">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="submit" class="btn" value="Register" name="register">
                <p>or register with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-google"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <!--end login dan register-->
    <script src="../js/login_and_register.js"></script>

    <!--Bootstrap Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    <!--script fontawesome-->
    <script src="https://kit.fontawesome.com/5e0fafd318.js" crossorigin="anonymous"></script>

  </body>
</html>