<?php
include('koneksi.php');

$id = $_POST['id'];
$namacoffee = $_POST['namacoffee'];
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
    $sql = "UPDATE coffee SET 
            gambar = IF('$gambar' = '', gambar, '$gambar'), 
            namacoffee = '$namacoffee', 
            harga = '$harga', 
            keterangan = '$keterangan' 
            WHERE idcoffee = $id";
} else {
    $sql = "INSERT INTO coffee (gambar, namacoffee, harga, keterangan) 
            VALUES ('$gambar', '$namacoffee', '$harga', '$keterangan')";
}

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>