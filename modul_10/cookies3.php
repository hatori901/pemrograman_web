<?php

setcookie("username", "", time() - 3600);
setcookie("nama_lengkap", "", time() - 3600);

echo "<h1>Cookie berhasil dihapus.</h1>";

echo "Klik <a href='cookies2.php'>di sini</a> untuk periksa cookies";
