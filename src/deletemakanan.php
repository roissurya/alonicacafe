<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM makanan WHERE idmakanan = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>
