<?php
include('koneksi.php');

// Cek apakah idabout ada di URL
if (isset($_GET['id'])) {
    $idabout = $_GET['id'];

    // Ambil data untuk mendapatkan path gambar
    $sql = "SELECT gambarabout FROM about WHERE idabout = $idabout";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Hapus file gambar
    if (file_exists($row['gambarabout'])) {
        unlink($row['gambarabout']);
    }

    // Hapus data dari database
    $sql = "DELETE FROM about WHERE idabout = $idabout";

    if (mysqli_query($conn, $sql)) {
        header('Location: about_admin.php'); // Redirect kembali ke daftar
    } else {
        echo 'Terjadi kesalahan saat menghapus data: ' . mysqli_error($conn);
    }
}
?>
