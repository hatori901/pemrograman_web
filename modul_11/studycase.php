<?php
session_start();

$route = "login";
$message = null;

$host = "localhost";
$database = "db_tugas";
$username = "root";
$password = "";

$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi->connect_errno) {
    die("Koneksi gagal: " . $koneksi->connect_errno);
}

if (isset($_SESSION['username'])) {
    $route = "home";
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        $route = "home";
        $_SESSION['route'] = "home";
    } else {
        $message = (object) [
            'type' => 'danger',
            'text' => 'Username atau password salah'
        ];
        header("refresh:2; url=studycase.php");
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    $route = "login";
}

if (isset($_POST['tambah'])) {
    $route = "tambah";
}

if (isset($_POST['tambah_data'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");

    if ($query) {
        $message = (object) [
            'type' => 'success',
            'text' => 'Berhasil menambah data'
        ];
        header("refresh:2; url=studycase.php");
    } else {
        echo "Gagal tambah data";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    $route = "update";
}

if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', alamat = '$alamat' WHERE id = '$id'");

    if ($query) {
        $message = (object) [
            'type' => 'success',
            'text' => 'Berhasil mengubah data'
        ];
        header("refresh:2; url=studycase.php");
    } else {
        echo "Gagal update data";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");

    if ($query) {
        $message = (object) [
            'type' => 'success',
            'text' => 'Berhasil menghapus data'
        ];
        header("refresh:2; url=studycase.php");
    } else {
        echo "Gagal hapus data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        .container {
            width: 80%;
            margin: auto;
        }

        .box {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px #ccc;
            border-radius: 20px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button:hover {
            transform: translateY(2px);
        }

        .flex {
            display: flex;
            gap: 10px;
        }

        .login-box {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 400px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($message)) : ?>
            <div class="alert <?= $message->type == "success" ? "alert-success" : "alert-danger" ?>">
                <?= $message->text ?>
            </div>
        <?php endif; ?>
        <?php if ($route == "home") : ?>
            <div class="box">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="text-lg">
                        Halo, <?= $_SESSION['username'] ?>
                    </div>
                    <div class="ms-3">
                        <form action="" method="post" onsubmit="return confirmLogout()">
                            <button class="btn btn-danger" type="submit" name="logout">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <h2 class="title">Data Mahasiswa</h2>
                <div class="box">
                    <form action="" method="post">
                        <button class="my-3 btn btn-primary" type="submit" name="tambah">
                            Tambah Data
                        </button>
                    </form>
                    <table class="table table-striped" id="data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM mahasiswa";
                            $result = mysqli_query($koneksi, $query);

                            $no = 1;
                            while ($data = mysqli_fetch_assoc($result)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nim'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td>
                                        <div class="flex">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                <button class="btn btn-primary" type="submit" name="update">
                                                    Edit
                                                </button>
                                            </form>
                                            <form action="" method="post" onsubmit="return confirmDelete()">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                <button class="btn btn-danger" type="submit" name="delete">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif ($route == "login") : ?>
            <div class="login-box">
                <div class="login-form mx-auto">
                    <h2 class="title">Login Page</h2>
                    <form name="loginForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validate()">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        <?php elseif ($route == "register") : ?>
            <h1>Halaman Register</h1>
            <form action=" register.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password">
                <button type="submit" name="register">Register</button>
            </form>

        <?php elseif ($route == "tambah") : ?>
            <h2>
                Tambah Data Mahasiswa
            </h2>
            <div class="box">
                <form action="" method="post" onsubmit="return confirmInsert()">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="flex">
                        <button class="btn btn-primary" type="submit" name="tambah_data">
                            Tambah
                        </button>
                        <a href="studycase.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        <?php elseif ($route == "update") : ?>
            <h2>
                Update Data Mahasiswa milik <?= $data['nama'] ?>
            </h2>
            <div class="box">
                <form action="" method="post" onsubmit="return confirmUpdate()">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" value="<?= $data['nim'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" required><?= $data['alamat'] ?></textarea>
                    </div>
                    <div class="flex">
                        <button class="btn btn-primary" type="submit" name="update_data">
                            Update
                        </button>
                        <a href="studycase.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        <?php endif; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });

        function validate() {
            let username = document.forms['loginForm']['username'].value;
            let password = document.forms['loginForm']['password'].value;

            if (username == "" || password == "") {
                alert("Username atau Password tidak boleh kosong");
                return false;
            }
        }

        function confirmLogout() {
            return confirm("Apakah anda yakin ingin logout?");
        }

        function confirmInsert() {
            return confirm("Apakah anda yakin ingin menambahkan data?");
        }

        function confirmUpdate() {
            return confirm("Apakah anda yakin ingin mengubah data?");
        }

        function confirmDelete() {
            return confirm("Apakah anda yakin ingin menghapus data?");
        }
    </script>
</body>

</html>