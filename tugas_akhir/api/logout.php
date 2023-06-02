<?php


if(isset($_SESSION['username'])) {
    header('Content-Type: application/json');
    if($controller->logout()) {
        echo json_encode([
            'status' => true,
            'message' => $controller->getMessage()
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => $controller->getMessage()
        ]);
    }
} else {
    $this->redirect('/login');
}