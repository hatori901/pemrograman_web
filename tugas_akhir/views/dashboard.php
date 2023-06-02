<?php

$controller->query("SELECT * FROM mata_pelajaran");

$jumlah_mapel = $controller->getRows();

$controller->query("SELECT * FROM users JOIN mata_pelajaran ON users.mata_pelajaran = mata_pelajaran.id WHERE role = 'guru'");

$jumlah_guru = $controller->getRows();

$guru = $controller->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<?php require './components/header.php'; ?>

<body>
    <?php require './components/navbar.php'; ?>
    <div class="container mx-auto">
        <h1 class="text-left my-3">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card py-3 px-2">
                    <div class="card-title">
                        <h5 class="text-center">Jumlah Guru</h5>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center"><?= $jumlah_guru ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-3 px-2">
                    <div class="card-title">
                        <h5 class="text-center">Jumlah Mata Pelajaran</h5>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center"><?= $jumlah_mapel ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-3 px-2">
                    <div class="card-title">
                        <h5 class="text-center">Jumlah Murid</h5>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">10</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="box my-5 table-responsive">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-left my-3">Daftar Guru</h3>
                <a href="/tambah-guru">
                    <button class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Tambah Guru
                    </button>
                </a>
            </div>
            <table id="guru" class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NIP</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Lulusan</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guru as $g) : ?>
                    <tr class="">
                        <td scope="row"><?= $g['nip'] ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/150" alt="" class="rounded-circle"
                                    style="width: 50px; height: 50px;">
                                <div class="mx-2">
                                    <?= $g['nama_depan'] . ' ' . $g['nama_belakang'] ?>
                                </div>
                            </div>
                        </td>
                        <td><?= $g['alamat'] ?></td>
                        <td><?= $g['lulusan'] ?></td>
                        <td><?= $g['nama'] ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <form action="/edit-guru" method="POST">
                                    <input type="hidden" name="nip" value="<?= $g['nip'] ?>">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-user-edit"></i>
                                        Edit
                                    </button>
                                </form>
                                <button class="btn btn-danger" onclick="deleteGuru(<?= $g['nip'] ?>)">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary mx-1';
        $('#guru').DataTable({
            "responsive": true,
        });
    });

    function deleteGuru(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data guru akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "/delete-guru",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        setTimeout(() => {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href = '/dashboard'
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }, 500)
                    }
                });
            }
        })
    }
    </script>
</body>

</html>