<?php

header('Content-Type: application/json');
if(isset($_POST['nip'])){
    $nip = $_POST['nip'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $alamat = $_POST['alamat'];
    $lulusan = $_POST['lulusan'];

    $controller->update('users', "nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', mata_pelajaran = '$mata_pelajaran', alamat = '$alamat', lulusan = '$lulusan'", "nip = '$nip'");
    echo json_encode([
        'status' => true,
        'message' => "Data berhasil diubah!"
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => "Data tidak ditemukan!"
    ]);
}