<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "alonica"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $pass = $_POST['pass']; // Ubah 'password' menjadi 'pass'

    // Mencegah SQL Injection
    $gmail = $conn->real_escape_string($gmail);
    $pass = $conn->real_escape_string($pass);

    // Query untuk memeriksa kredensial
    $sql = "SELECT * FROM admin WHERE gmail='$gmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Jika Anda menggunakan hashing untuk password, gunakan password_verify
        if ($row['pass'] === $pass) { // Ubah 'password' menjadi 'pass'
            echo "success"; // Kredensial benar
        } else {
            echo "fail"; // Password salah
        }
    } else {
        echo "fail"; // Gmail tidak ditemukan
    }
}

// Menutup koneksi
$conn->close();
?>