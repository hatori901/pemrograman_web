<?php

$value1 = "test";
$value2 = "test2";

setcookie("username", $value1);
setcookie("nama_lengkap", $value2, time() + 3600); /* expire in 1 hour */

echo "<h1>Ini halaman pengesetan cookies</h1>";
echo "<h2>Klik <a href='cookies2.php'>di sini</a> untuk pemeriksaan cookies</h2>";
