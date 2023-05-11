<?php

setcookie("username", "", time() - 3600); // delete cookie 'username'
setcookie("nama_lengkap", "", time() - 3600); // delete cookie 'nama_lengkap'

echo "<h1>Cookie berhasil dihapus.</h1>";

echo "Klik <a href='cookies2.php'>di sini</a> untuk periksa cookies";