<?php
$host = 'localhost';
$user = 'root'; // Ubah jika username MySQL Anda berbeda
$password = ''; // Ubah jika ada password untuk MySQL Anda
$database = 'alonica';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>