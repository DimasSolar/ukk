<?php
include "koneksi.php";
session_start();

if (isset($_SESSION["username"])) {
    header("location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256',$_POST['password']);
    $cpassword = hash('sha256',$_POST['password']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO users (nama, nohp, alamat, username, email, password) 
                VALUES ('$nama', '$nohp', '$alamat', '$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Selamat! Registrasi Berhasil')</script>";
            $username = "";
            $email = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        } else {
            echo "<script>alert('Whopsie! Terjadi Kesalahan')</script>";
        }
        } else{
            echo "<script>alert('Email Sudah Terdaftar')</script>";
        }
        
     } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Nama" name="nama" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="No Telpon" name="nohp" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Alamat" name="alamat" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
        </form>
        <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login</a></p>
    </div>
</body>
</html>