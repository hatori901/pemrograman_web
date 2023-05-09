<?php

session_start();
if (isset($_POST['login'])) {
    $user = $_POST['user']; // mengambil isi dari inputan username
    $pass = $_POST['pass']; // mengambil isi dari inputan password

    if ($user == "erwin" && $pass = "admin") { // jika isi dari variabel $user dan $pass sesuai dengan kondisi
        $_SESSION['login'] = $user; // membuat session dengan nama 'login' dan isi dari variabel $user
        echo "<h1>Anda berhasil LOGIN</h1>";
        echo "<h2>Klik <a href='session2.php'>di sini
            (session2.php)</a>
            untuk menuju ke halaman pemeriksaan session";
    }
} else {
?>
    <html>

    <head>
        <title>Login here...</title>
    </head>

    <body>
        <form action="" method="post">
            <h2>Login Here...</h2>
            Username : <input type="text" name="user"><br>
            Password : <input type="password" name="pass"><br>
            <input type="submit" name="login" value="Log In">
        </form>
    </body>

    </html>
<?php
}
