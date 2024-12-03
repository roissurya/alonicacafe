<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE idadmin = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: profile.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
