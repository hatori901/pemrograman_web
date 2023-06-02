<?php


$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

header('Content-Type: application/json');
if(isset($username) && isset($password)){
    $login = $controller->login ($username, $password);
    if ($login) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $controller->getRole($username);
        echo json_encode([
            'status' => true,
            'message' => "Login berhasil!"
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => $controller->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => false,
        'message' => "Username dan password harus diisi!"
    ]);
}