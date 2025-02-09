<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "db_dimas";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn){
    die("koneksi error".mysqli_connect_error());
}
?>
