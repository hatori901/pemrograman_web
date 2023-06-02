<?php

require 'config.php';

class Controller {
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $connection;
    private $result;
    private $rows;
    private $message;
    
    public function __construct($_HOSTNAME, $_USERNAME, $_PASSWORD, $_DATABASE) {
        $this->hostname = $_HOSTNAME;
        $this->username = $_USERNAME;
        $this->password = $_PASSWORD;
        $this->database = $_DATABASE;
        $this->connect();
    }
    
    public function connect() {
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function disconnect() {
        mysqli_close($this->connection);
    }

    public function query($query) {
        $this->result = mysqli_query($this->connection, $query);
    }

    public function fetch() {
        return mysqli_fetch_array($this->result);
    }

    public function fetchAll() {
        $rows = array();
        while ($row = $this->fetch()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getRows() {
        $this->rows = mysqli_num_rows($this->result);
        return $this->rows;
    }

    public function insert($table, $fields, $values) {
        $query = "INSERT INTO $table ($fields) VALUES ($values)";
        $this->query($query);
    }

    public function update($table, $fields, $condition) {
        $query = "UPDATE $table SET $fields WHERE $condition";
        $this->query($query);
    }

    public function delete($table, $condition) {
        $query = "DELETE FROM $table WHERE $condition";
        $this->query($query);
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function redirect($location) {
        header("Location: $location");
    }
    
    public function login($username, $password) {
        $this->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        if ($this->getRows() == 1) {
            $user = $this->fetch();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            $this->setMessage('Username atau password salah!');
            return false;
        }
    }

    public function register($username, $password, $role) {
        $this->query("SELECT * FROM users WHERE username = '$username'");
        if ($this->getRows() == 0) {
            $this->insert('users', 'username, password, role', "'$username', '$password', '$role'");
            $this->setMessage('Registrasi berhasil!');
        } else {
            $this->setMessage('Username sudah terdaftar!');
        }
    }

    public function logout() {
        session_destroy();
        $this->setMessage('Logout berhasil!');
        return true;
    }

    public function checkLogin() {
        if (!isset($_SESSION['username'])) {
            $this->redirect('/login');
        }
    }

    public function getRole($username) {
        $this->query("SELECT role FROM users WHERE username = '$username'");
        $user = $this->fetch();
        return $user['role'];
    }

    public function getUser($username) {
        $this->query("SELECT * FROM users WHERE username = '$username'");
        $user = $this->fetch();
        return (object) [
            'nama' => $user['nama_depan'] . ' ' . $user['nama_belakang'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
    }

}

$controller = new Controller($_HOSTNAME, $_USERNAME, $_PASSWORD, $_DATABASE);