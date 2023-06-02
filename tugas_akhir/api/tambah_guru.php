<?php

header('Content-Type: application/json');
if(isset($_POST['nip'])){
    $nip = $_POST['nip'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $alamat = $_POST['alamat'];
    $lulusan = $_POST['lulusan'];

    $controller->insert("users","nip, nama_depan, nama_belakang, mata_pelajaran, alamat, lulusan", "'$nip', '$nama_depan', '$nama_belakang', '$mata_pelajaran', '$alamat', '$lulusan'");
    echo json_encode([
        'status' => true,
        'message' => "Data berhasil ditambahkan!"
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => "Data tidak ditemukan!"
    ]);
}