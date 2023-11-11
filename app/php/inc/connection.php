<?php
// koneksi terhubung ke data base mysql
$host = "localhost";
$user = "root";
$pass = "";
$base = "apps";
$con = mysqli_connect($host, $user, $pass, $base);


// untuk mengecek apakah sudah terhubung ke mysql 
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>