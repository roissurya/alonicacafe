<?php
include('koneksi.php');

$id = $_POST['id'];
$namasnack = $_POST['namasnack'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

// Proses gambar
$gambar = '';
if ($_FILES['gambar']['name']) {
    $targetDir = "uploads/";
    $gambar = $targetDir . basename($_FILES['gambar']['name']);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
}

if ($id) {
    $sql = "UPDATE snack SET 
            gambar = IF('$gambar' = '', gambar, '$gambar'), 
            namasnack = '$namasnack', 
            harga = '$harga', 
            keterangan = '$keterangan' 
            WHERE idcoffee = $id";
} else {
    $sql = "INSERT INTO snack (gambar, namasnack, harga, keterangan) 
            VALUES ('$gambar', '$namasnack', '$harga', '$keterangan')";
}

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>