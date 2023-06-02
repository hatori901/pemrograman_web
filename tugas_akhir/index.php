<?php
session_start();

include 'controller.php';


$request = $_SERVER['REQUEST_URI'];
switch($request){
    case '':
    case '/':
        
        require __DIR__ . '/views/index.php';
        break;
    case '/login':
        require __DIR__ . '/views/login.php';
        break;
    case '/api/login-request':
        require __DIR__ . '/api/login_request.php';
        break;
    case '/api/logout':
        require __DIR__ . '/api/logout.php';
        break;
    case '/register':
        require __DIR__ . '/views/register.php';
        break;
    case '/dashboard':
        $controller->checkLogin();
        require __DIR__ . '/views/dashboard.php';
        break;
    case '/mata-pelajaran':
        $controller->checkLogin();
        require __DIR__ . '/views/matapelajaran.php';
        break;
    case '/tambah-guru':
        $controller->checkLogin();
        require __DIR__ . '/views/tambah_guru.php';
        break;
    case '/api/tambah-guru':
        $controller->checkLogin();
        require __DIR__ . '/api/tambah_guru.php';
        break;
    case '/edit-guru':
        $controller->checkLogin();
        require __DIR__ . '/views/edit_guru.php';
        break;
    case '/api/edit-guru':
        $controller->checkLogin();
        require __DIR__ . '/api/edit_guru.php';
        break;
    case '/api/delete-guru':
        $controller->checkLogin();
        require __DIR__ . '/api/delete_guru.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
        http_response_code(404);
        break;
}