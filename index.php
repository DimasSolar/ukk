<?php
include "koneksi.php";
session_start();
if (isset($_SESSION['username'])) {
    header("location: todolist");
    exit();
}

if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256',$_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['username'] = $row['username'];
        header("location: todolist");
        exit();
    } else {
        echo "<script>alert('Login gagal')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="library/css/a.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;  margin-bottom: 20px;">Login mas</p>
            <div class="input-group">
            <input type="email" style="color: #fff1fd" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
            <input type="password" style="color: #fff1fd" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
            <button type="submit"  name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="regis.php">Register Sekarang</a></p>
    </div>
</body>
</html>