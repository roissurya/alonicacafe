<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM noncoffee WHERE idnoncoffee = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>
