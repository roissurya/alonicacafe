<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
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

    <section class="hero">
        <img class="nas" src="bg.png" />
        <div class="desc">
            <h1 class="kata">
                A place within <i>yourself</i> where being<br />you and having you is
                <i>enough from you</i>
            </h1>
        </div>

        <div class="about">
            <h2 class="judul">Alonica</h2>
            <h5 class="ket">Dengan mengedepankan kenyamanan, kami tidak hanya berfokus pada kualitas produk kami, namun
                juga menawarkan experience bagi customer.
                Terletak di Jl. Dr. Ratulangi, merupakan lokasi strategis di pertengahan kota buat kawan yang lelah
                beraktivitas seharian dan butuh
                tempat yang nyaman untuk menetralkan pikiran. Kami siap melayani kawan alonica setiap hari, pukul 9.00 -
                23.00 dan khusus weekend 8.00-24.00
            </h5>
        </div>

        <a href='http://www.freevisitorcounters.com'>free counter</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=99a0473a0dfd206aab7c3fd30f57dc7c62558a32'></script>
        <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1269291/t/2"></script>

        <div >
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2098.4890523462786!2d119.95217061892902!3d-5.551478451059245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbeb3b1057e558f%3A0xc42521b15cc69dda!2sAlonica%20Cafe!5e0!3m2!1sid!2sid!4v1730830875540!5m2!1sid!2sid"
            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <div class="kaki">
        <h5 class="cr">Copyright Alonica 2024</h5>
    </div>
    

    <audio autoplay loop>
        <source src="Alonica  LANY  Lirik Terjemahan Indonesia.mp3" type="audio/mpeg">
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