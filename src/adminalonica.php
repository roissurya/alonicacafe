<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
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
                        <a href="adminalonica.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kamus
                            Menu</a>
                    </li>
                    <li>
                        <a href="about_admin.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="home.php"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Keluar</a>
                    </li>
                    <li>
                        <a href="profile.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="judulmakanan">Our Coffee</h1>
    <div class="container">
        <button onclick="window.location.href='formcoffee.php'">Tambah Coffee</button>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Coffee</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM coffee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><img src='{$row['gambar']}' alt='Gambar' width='120'></td>
                                <td>{$row['namacoffee']}</td>
                                <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='formcoffee.php?id={$row['idcoffee']}'>Edit</a> | 
                                    <a href='deletecoffee.php?id={$row['idcoffee']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else { 
                    echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <h1 class="judulmakanan">Our Non Coffee</h1>
    <div class="container">
        <button onclick="window.location.href='formnoncoffee.php'">Tambah Non Coffee</button>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Non Coffee</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM noncoffee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><img src='{$row['gambar']}' alt='Gambar' width='120'></td>
                                <td>{$row['namanoncoffee']}</td>
                                <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='formnoncoffee.php?id={$row['idnoncoffee']}'>Edit</a> | 
                                    <a href='deletenoncoffee.php?id={$row['idnoncoffee']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else { 
                    echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <h1 class="judulmakanan"> Our Makanan Berat</h1>
    <div class="container">
        <button onclick="window.location.href='formmakanan.php'">Tambah Makanan</button>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM makanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><img src='{$row['gambar']}' alt='Gambar' width='120'></td>
                                <td>{$row['namamakanan']}</td>
                                <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='formmakanan.php?id={$row['idmakanan']}'>Edit</a> | 
                                    <a href='deletemakanan.php?id={$row['idmakanan']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else { 
                    echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <h1 class="judulmakanan"> Our Snack</h1>
    <div class="container">
        <button onclick="window.location.href='formsnack.php'">Tambah Snack</button>
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Snack</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM snack";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td><img src='{$row['gambar']}' alt='Gambar' width='120'></td>
                                <td>{$row['namasnack']}</td>
                                <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='formsnack.php?id={$row['idsnack']}'>Edit</a> | 
                                    <a href='deletesnack.php?id={$row['idsnack']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else { 
                    echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="akhir">
        <h1 class="end">Nikmati orderan kawan langsung di kafe kami, dapatkan pengalaman terbaik <i>#SpecialUntukKawan</i> </h1>
    </div>

    <div class="kaki2">
        <h5 class="cr2">Reservasi Meja dan Pemesanan Online Kawan <br>
                Bisa Melalui Sosial Media Kami
    </h5>
    <div class="social-buttons">
        <a href="https://wa.me/6285810038777" target="_blank" class="btn-whatsapp">WhatsApp</a>
        <a href="https://instagram.com/alonica_cafe" target="_blank" class="btn-instagram">Instagram</a>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('[data-collapse-toggle="navbar-solid-bg"]');
            const navbarMenu = document.getElementById('navbar-solid-bg');

            toggleButton.addEventListener('click', function () {
                navbarMenu.classList.toggle('hidden'); // Toggle the hidden class to show/hide the menu
                const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true' || false;
                toggleButton.setAttribute('aria-expanded', !isExpanded); // Toggle aria-expanded attribute
            });
        });
    </script>
</body>
</html>






</body>

</html>