<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'connection.php';
    
// register
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $psw_user = $_POST['psw_user'];
    $email_user = $_POST['email_user'];

    $checkUser = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar'); window.location.href = './pages/login.php';</script>";
    } else {
        $insert = "INSERT INTO users(username, psw_user, email_user) VALUES ('$username', '$psw_user', '$email_user')";
        if ($conn->query($insert)) {
            echo "<script>alert('Akun berhasil dibuat! Silakan login'); window.location.href = './pages/login.php';</script>";
        } else {
            echo "ERROR: " . $conn->error;
        }
    }
}

// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['psw_user'];

    // cek di admin
    $admin_query = "SELECT * FROM admin WHERE username = '$username'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        $admin = $admin_result->fetch_assoc();

        if ($password == $admin['password']) {
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';
            header("Location: /ketjeh/admin/index.php");
            exit;
        } else {
            echo "<script>alert('Password admin salah'); window.location.href = './pages/login.php';</script>";
            exit;
        }
    }

    // cek di user
    $user_query = "SELECT * FROM users WHERE username = '$username'";
    $user_result = $conn->query($user_query);

    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();

        if ($password == $user['psw_user']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = 'user';
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Password user salah'); window.location.href = './pages/login.php';</script>";
            exit;
        }
    }
    echo "<script>alert('Akun tidak ditemukan'); window.location.href = './pages/login.php';</script>";
    exit;
}


?>
