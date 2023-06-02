<?php

header('Content-Type: application/json');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $controller->delete('users', "nip = '$id'");
    echo json_encode([
        'status' => true,
        'message' => "Data berhasil dihapus!"
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => "Data tidak ditemukan!"
    ]);
}