<?php

if (isset($_COOKIE['username'])) { // cek apakah ada cookie dengan nama 'username'
    echo "<h1>Cookie 'username' ada. Isinya : " . $_COOKIE['username'] . "</h1> <br>"; // tampilkan isi cookie 'username'
} else { // jika tidak ada 
    echo "<h1>Cookie 'username' TIDAK ada.</h1>"; // tampilkan teks
}

if (isset($_COOKIE['nama_lengkap'])) { // cek apakah ada cookie dengan nama 'nama_lengkap'
    echo "<h1>Cookie 'nama_lengkap' ada. Isinya : " . $_COOKIE['nama_lengkap'] . "</h1> <br>"; // tampilkan isi cookie 'nama_lengkap' 
} else { // jika tidak ada
    echo "<h1>Cookie 'nama_lengkap' TIDAK ada.</h1>"; // tampilkan teks
}

echo "Klik <a href='cookies3.php'>di sini</a> untuk hapus cookies"; // buat link untuk menghapus cookie