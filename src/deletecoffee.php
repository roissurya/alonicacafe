<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM coffee WHERE idcoffee = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: adminalonica.php');
} else {
    echo "Error: " . $conn->error;
}
?>
