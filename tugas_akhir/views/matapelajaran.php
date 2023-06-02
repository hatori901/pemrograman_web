<?php

$controller->query("SELECT * FROM mata_pelajaran");
$mapel = $controller->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<?php require './components/header.php'; ?>

<body>
    <?php require './components/navbar.php'; ?>
    <div class="container mx-auto">
        <h1 class="text-left my-3">Mata Pelajaran</h1>
        <div class="box table-responsive">
            <table id="mapel" class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mapel as $m) : ?>
                    <tr class="">
                        <td scope="row"><?= $m['id'] ?></td>
                        <td><?= $m['nama'] ?></td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteMapel(<?= $m['id'] ?>)">
                                Delete
                            </button>
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
        $('#mapel').DataTable({
            "responsive": true,
        });
    });
    </script>
</body>

</html>