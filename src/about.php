<?php
// Koneksi ke database
include('koneksi.php');

// Query untuk mengambil data dari tabel 'about'
$sql = "SELECT gambarabout, keterangan FROM about";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Alonica</title>
    <style>
        /* Styling untuk card */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-top: 20px;
            border-radius: 20px;
            margin-left: 100px;
            margin-right: 100px;
        }

        .card {
            width: 400px;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            padding-bottom: 5%;
        }

        .card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
            background-color: #ffffff;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .card-content h1 {
           text-align: center;
            font-size: 1.25rem;
            color: #800000;
            font-family: "Happy Times Two";
            margin-bottom: 10px;
        }

        /* Hover effect */
        .card:hover {
            transform: translateY(-10px);
        }
    </style>
    <link rel="stylesheet" href="./output.css">
</head>

<body>

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
                        <a href="home.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="kamusmenu.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kamus
                            Menu</a>
                    </li>
                    <li>
                        <a href="about.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="admin.php"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-yellow-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="badan">
        <div class="video-container">
            <video width="100%" autoplay loop muted>
                <source src="video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="teksutama">
            <h1 class="quotes">Tempat Ternyaman <i>#KawanAlonica</i> Untuk <br>
                Menemukan Kehangatan Dalam Setiap Pertemuan <br>
                <i>#BackToAlonica</i>
            </h1>
        </div>

        <div class="garis">
            <hr>
        </div>

        <div class="card-container">
            <?php
            if (mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan setiap row dalam card
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                <div class='card'>
                <img src='{$row['gambarabout']}' alt='Gambar'>
                <div class='card-content'>
                    <h1>{$row['keterangan']}</h1>
                </div>
            </div>
            ";
                }
            } else {
                echo '<p>No data found.</p>';
            }
            ?>
        </div>

    
           </section>



    <div class="kaki">
        <h5 class="cr">#BackToAlonica</h5>
    </div>


    <audio autoplay loop>
        <source src="coffee & beats  jazzy japan lofi mix.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>

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