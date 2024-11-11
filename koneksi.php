<?php
$host = "localhost";
$user = "root"; // sesuaikan dengan username database Anda
$pass = ""; // sesuaikan dengan password database Anda
$db = "nama_database"; // sesuaikan dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?> 