<?php

$route = "home";

$host = "localhost";
$database = "db_latihan";
$username = "root";
$password = "";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error());
}

if (isset($_POST['tambah'])) {
    $route = "tambah";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    $route = "update";
}

if (isset($_POST['tambah_data'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim', '$nama', '$alamat')");

    if ($query) {
        header("location: latihan.php");
    } else {
        echo "Gagal tambah data";
    }
}

if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', alamat = '$alamat' WHERE id = '$id'");

    if ($query) {
        header("location: latihan.php");
    } else {
        echo "Gagal update data";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");

    if ($query) {
        header("location: latihan.php");
    } else {
        echo "Gagal delete data";
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr th {
            background-color: #2222;
            font-weight: bold;
            text-align: left;
            padding: 20px 10px;
        }

        tr td {
            padding: 20px 10px;
            text-align: left;
        }

        button {
            padding: 5px 10px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            transform: translateY(2px);
        }

        .btn {
            padding: 5px 10px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            color: #ffff;
            background-color: #3b82f6;
        }

        .btn-danger {
            color: #ffff;
            background-color: #f43f5e;
        }

        .flex {
            display: flex;
            gap: 5px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 5px 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if ($route == "home") : ?>
            <h2>
                Data Mahasiswa
            </h2>
            <div class="box">
                <form action="" method="post">
                    <button class="btn-primary" type="submit" name="tambah">
                        Tambah Data
                    </button>
                </form>
                <table>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td>
                                <div class="flex">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <button class="btn-primary" type="submit" name="update">
                                            Update
                                        </button>
                                    </form>
                                    <form action="" method="post" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <button class="btn-danger" type="submit" name="delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
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
                        <button class="btn-primary" type="submit" name="tambah_data">
                            Tambah
                        </button>
                        <a href="latihan.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        <?php elseif ($route == "update") : ?>
            <h2>
                Update Data Mahasiswa
            </h2>
            <div class="box">
                <form action="" method="post" onsubmit="return confirmUpdate()">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" value="<?= $data['nim'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"><?= $data['alamat'] ?></textarea>
                    </div>
                    <div class="flex">
                        <button class="btn-primary" type="submit" name="update_data">
                            Update
                        </button>
                        <a href="latihan.php" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        <?php endif; ?>

    </div>

    <script>
        function confirmInsert() {
            return confirm("Apakah anda yakin ingin menambahkan data ini?");
        }

        function confirmDelete() {
            return confirm("Apakah anda yakin ingin menghapus data ini?");
        }

        function confirmUpdate() {
            return confirm("Apakah anda yakin ingin mengupdate data ini?");
        }
    </script>
</body>

</html>