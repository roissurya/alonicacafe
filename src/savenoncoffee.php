<?php
include('koneksi.php');

$id = $_POST['id'];
$namanoncoffee = $_POST['namanoncoffee'];
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
    $sql = "UPDATE noncoffee SET 
            gambar = IF('$gambar' = '', gambar, '$gambar'), 
            namanoncoffee = '$namanoncoffee', 
            harga = '$harga', 
            keterangan = '$keterangan' 
            WHERE idnoncoffee = $id";
} else {
    $sql = "INSERT INTO noncoffee (gambar, namanoncoffee, harga, keterangan) 
            VALUES ('$gambar', '$namanoncoffee', '$harga', '$keterangan')";
}

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>