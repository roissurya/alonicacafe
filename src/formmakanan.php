<?php 
include('koneksi.php'); 

$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = [
    'gambar' => '',
    'namamakanan' => '',
    'harga' => '',
    'keterangan' => ''
];

if ($id) {
    $sql = "SELECT * FROM makanan WHERE idmakanan = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Makanan</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <div class="container">
        <h1><?= $id ? 'Edit' : 'Tambah' ?> Makanan</h1>
        <form action="savemakanan.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar">
            <label for="namamakanan">Nama Makanan:</label>
            <input type="text" name="namamakanan" value="<?= $data['namamakanan'] ?>" required>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" value="<?= $data['harga'] ?>" required>
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" required><?= $data['keterangan'] ?></textarea>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
