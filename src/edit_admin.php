<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin WHERE idadmin = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $gmail = $_POST['gmail'];
        $pass = $_POST['pass'];

        $update_sql = "UPDATE admin SET nama = '$nama', gmail = '$gmail', pass = '$pass' WHERE idadmin = $id";
        if (mysqli_query($conn, $update_sql)) {
            header("Location: profile.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="./output.css">
</head>
<body class="menubody">
    <nav class="border-gray-200 bg-gray-50 dark:bg-[#800000] dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="admin_list.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="logo.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Edit Admin</span>
            </a>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Edit Data Admin</h2>
        <form method="POST">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="gmail" class="block text-sm font-medium text-gray-700">Gmail</label>
                <input type="email" id="gmail" name="gmail" value="<?php echo $row['gmail']; ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="pass" name="pass" value="<?php echo $row['pass']; ?>" class="mt-1 block w-full px-4 py-2 border rounded-md" required>
            </div>
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md">Update</button>
        </form>
    </div>
</body>
</html>
