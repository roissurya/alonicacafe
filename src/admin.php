<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="./output.css">
    <script>
        function validateLogin() {
            var gmail = document.getElementById("gmail").value;
            var password = document.getElementById("password").value;

            if (gmail === "" || password === "") {
                alert("Gmail dan Password harus diisi!");
                return false;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "login.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "success") {
                        alert("Login Admin Berhasil");
                        window.location.href = "adminalonica.php";
                    } else {
                        alert("Gmail atau Password salah");
                    }
                }
            };
            xhr.send("gmail=" + encodeURIComponent(gmail) + "&pass=" + encodeURIComponent(password));
            return false;
        }
    </script>
</head>
<body class="bdlogin">
    <div class="form-container">
        <h1 class="judullogin">Login Admin</h1>
        <form onsubmit="return validateLogin()">
            <label for="gmail">Gmail:</label><br>
            <input type="email" id="gmail" name="gmail" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="pass" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
