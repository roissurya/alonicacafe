<?php
include('koneksi.php');
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Periksa apakah data yang diperlukan ada
    if (!empty($nama) && !empty($gmail) && !empty($pass)) {
        // Hash password sebelum disimpan
        $sql = "INSERT INTO admin (nama, gmail, pass) VALUES ('$nama', '$gmail', '$pass')";

        if (mysqli_query($conn, $sql)) {
            // Jika berhasil, tampilkan notifikasi
            $successMessage = "Admin berhasil ditambahkan!";
        } else {
            // Tampilkan pesan error jika query gagal
            $successMessage = "Terjadi kesalahan saat menambahkan admin: " . mysqli_error($conn);
        }
    } else {
        $successMessage = "Semua kolom harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body class="menubody">
<nav class="border-gray-200 bg-gray-50 dark:bg-[#800000] dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
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
                        <a href="profile.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Form Tambah Admin</h2>

        <?php if ($successMessage): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="gmail" class="block text-sm font-medium text-gray-700">Gmail</label>
                <input type="email" id="gmail" name="gmail" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="pass" name="pass" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md">Tambah Admin</button>
        </form>
    </div>
</body>
</html>
