<?php
include('koneksi.php');

$successMessage = '';
$errorMessage = '';

// Cek apakah idabout ada di URL
if (isset($_GET['id'])) {
    $idabout = $_GET['id'];

    // Ambil data lama dari database
    $sql = "SELECT * FROM about WHERE idabout = $idabout";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
        $gambarabout = $_FILES['gambarabout'];

        if ($gambarabout['error'] == 0) {
            // Tentukan lokasi folder upload
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($gambarabout['name']);

            if (move_uploaded_file($gambarabout['tmp_name'], $uploadFile)) {
                // Hapus gambar lama
                unlink($row['gambarabout']); 

                // Update data di database
                $sql = "UPDATE about SET gambarabout = '$uploadFile', keterangan = '$keterangan' WHERE idabout = $idabout";

                if (mysqli_query($conn, $sql)) {
                    $successMessage = 'Data berhasil diupdate!';
                } else {
                    $errorMessage = 'Terjadi kesalahan saat mengupdate data: ' . mysqli_error($conn);
                }
            } else {
                $errorMessage = 'Gagal mengunggah gambar.';
            }
        } else {
            $sql = "UPDATE about SET keterangan = '$keterangan' WHERE idabout = $idabout";
            if (mysqli_query($conn, $sql)) {
                $successMessage = 'Data berhasil diupdate!';
            } else {
                $errorMessage = 'Terjadi kesalahan saat mengupdate data: ' . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body class="menubody">
<nav class="border-gray-200 bg-gray-50 dark:bg-[#800000] dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"a
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-white rounded-lg md:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 hover:text-red-600"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-red-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="about_admin.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Edit About</h2>

        <!-- Menampilkan Pesan Notifikasi -->
        <?php if ($successMessage): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit data About -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="mt-1 block w-full px-4 py-2 border rounded-md" required><?php echo $row['keterangan']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="gambarabout" class="block text-sm font-medium text-gray-700">Gambar About</label>
                <input type="file" id="gambarabout" name="gambarabout" class="mt-1 block w-full px-4 py-2 border rounded-md">
                <img src="<?php echo $row['gambarabout']; ?>" alt="Gambar About" class="w-32 h-32 object-cover mt-2">
            </div>
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md">Update About</button>
        </form>
    </div>
</body>
</html>
