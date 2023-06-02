<?php

if (isset($_POST['nip'])) {
    $nip = $_POST['nip'];

    $controller->query("Select * from users where nip = '$nip'");
    $guru = $controller->fetch();

    $controller->query("SELECT * FROM mata_pelajaran");
    $mapel = $controller->fetchAll();
} else {
    $controller->redirect('/dashboard');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require './components/header.php'; ?>

<body>
    <?php require './components/navbar.php'; ?>

    <div class="container mx-auto">
        <div class="box my-3">
            <h3>Edit data <?= $guru['nama_depan'] ?></h3>
            <div class="row my-2">
                <form id="edit" class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" value="<?= $guru['nama_depan'] ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang"
                                value="<?= $guru['nama_belakang'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-select" id="mata_pelajaran">
                            <option selected>Pilih Mata Pelajaran</option>
                            <?php foreach ($mapel as $m) : ?>
                            <option value="<?= $m['id'] ?>"
                                <?= $m['id'] == $guru['mata_pelajaran'] ? 'selected' : '' ?>>
                                <?= $m['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="10" rows="10"
                            class="form-control"><?= $guru['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lulusan">Lulusan</label>
                        <input type="text" class="form-control" id="lulusan" value="<?= $guru['lulusan'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="edit-btn" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                <div class="col-md-6 alert alert-primary">
                    <h5>Perhatian!</h5>
                    <p>Untuk mengedit data guru, silahkan isi semua form di sebelah kiri.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(() => {
        $('#edit').submit((e) => {
            e.preventDefault()
            const nip = '<?= $guru['nip'] ?>'
            const nama_depan = $('#nama_depan').val()
            const nama_belakang = $('#nama_belakang').val()
            const mata_pelajaran = $('#mata_pelajaran').val()
            const alamat = $('#alamat').val()
            const lulusan = $('#lulusan').val()

            $('#edit-btn').html("Loading...")

            $.ajax({
                type: "POST",
                url: "/api/edit-guru",
                data: {
                    nip,
                    nama_depan,
                    nama_belakang,
                    mata_pelajaran,
                    alamat,
                    lulusan
                },
                success: function(response) {
                    setTimeout(() => {
                        $('#edit-btn').html("Edit")
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
        })
    })
    </script>

</body>

</html>