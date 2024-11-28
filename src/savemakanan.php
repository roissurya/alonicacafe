<?php
include('koneksi.php');

$id = $_POST['id'];
$namamakanan = $_POST['namamakanan'];
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
    $sql = "UPDATE makanan SET 
            gambar = IF('$gambar' = '', gambar, '$gambar'), 
            namamakanan = '$namamakanan', 
            harga = '$harga', 
            keterangan = '$keterangan' 
            WHERE idmakanan = $id";
} else {
    $sql = "INSERT INTO makanan (gambar, namamakanan, harga, keterangan) 
            VALUES ('$gambar', '$namamakanan', '$harga', '$keterangan')";
}

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>