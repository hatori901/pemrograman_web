<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=   , initial-scale=1.0">
    <title>Pemrosesan Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        label {
            display: block;
        }

        form {
            display: block;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .box {
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
            margin: 20px 0;

        }

        .shadow {
            box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.2);
        }

        .hasil {
            margin-top: 10px;
            padding: 10px;
            background-color: #cccc;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Pemrosesan Form</h1>
        <div class="box shadow">
            <div class="box shadow">
                <h2>
                    Metode GET
                </h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama">
                    <button type="submit">
                        OK
                    </button>
                </form>

                <div class="hasil">
                    <div>
                        Hasil :
                    </div>
                    <?php
                    if (isset($_GET['nama'])) {
                        echo 'Hallo ' . $_GET['nama'];
                    }
                    ?>
                </div>
            </div>
            <div class="box shadow">
                <h2>
                    Metode POST
                </h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama">
                    <button type="submit">
                        OK
                    </button>
                </form>

                <div class="hasil">
                    <div>
                        Hasil :
                    </div>
                    <?php
                    if (isset($_POST['nama'])) {
                        echo 'Hallo ' . $_POST['nama'];
                    }
                    ?>
                </div>
            </div>
            <p style="font-weight: bold;">
                Bagaimana jika metode GET ditangani dengan superglobal $_POST; dan
                sebaliknya, metode POST ditangani dengan $_GET? Jelaskan!Coba manfaatkan $_REQUEST untuk menggantikan
                fungsi $_GET atau $_POST.
            </p>
            <p>
                Jika menggunakan metode GET dengan variabel $_POST atau metode POST dengan variabel $_GET, maka
                akan menghadapi beberapa masalah seperti kesalahan dalam mengakses data, masalah keamanan, dan batasan
                ukuran data yang dikirim.

                Sebagai alternatif, bisa menggunakan variabel $_REQUEST yang menggabungkan data dari metode GET, POST,
                dan COOKIE. Namun, penggunaan $_REQUEST juga memiliki beberapa kelemahan, seperti kurangnya kejelasan
                dalam
                kode dan potensi keamanan yang lebih rendah.

                Oleh karena itu, disarankan untuk tetap menggunakan variabel $_GET dan $_POST untuk masing-masing metode
                pengiriman data yang sesuai agar kode mudah dipahami dan dikelola serta lebih aman.
            </p>
        </div>
        <div class="box shadow">
            <h2>Prefilling Textfield</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= isset($_POST['nama']) ? $_POST['nama'] : '' ?>">
                <button type="submit">
                    OK
                </button>
            </form>

            <div class="hasil">
                <div>
                    Hasil :
                </div>
                <?php
                if (isset($_POST['nama'])) {
                    echo 'Hallo ' . $_POST['nama'];
                }
                ?>
            </div>
        </div>

        <div class="box shadow">
            <div class="box shadow">
                <h2>Radio Button</h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="sex">Jenis Kelamin</label>
                    <input type="radio" name="sex" value="Pria" /> Pria
                    <input type="radio" name="sex" value="Wanita" /> Wanita
                    <button type="submit">
                        OK
                    </button>
                </form>
                <div class="hasil">
                    <div>
                        Hasil :
                    </div>
                    <?php
                    if (isset($_POST['sex'])) {
                        echo $_POST['sex'];
                    }
                    ?>
                </div>
            </div>
            <p style="font-weight: bold;">
                Bagaimana memberikan nilai default pada koleksi radio button?
            </p>
            <p>
                Untuk memberikan nilai default pada koleksi radio button dalam PHP, Anda harus mengecek apakah nilai
                radio button tersebut sama dengan nilai default yang Anda tentukan dan menambahkan atribut `checked`
                jika kondisinya sesuai. Berikut adalah contoh
            </p>
            <pre>
            <code>
                &lt;form action="" method="post"&gt;
                    &lt;label for="sex">Laki-laki&lt;/label&gt;
                    &lt;input type="radio" id="sex" name="sex" value="Pria" &lt;?= $_POST['sex'] == 'Pria' ? 'checked' : ''; ?&gt;

                    &lt;label for="sex"&gt;Perempuan&lt;/label&gt;
                    &lt;input type="radio" id="sex" name="sex" value="Wanita" &lt;?= $_POST['sex'] == 'Wanita' ? 'checked' : ''; ?&gt;

                    &lt;input type="submit" value="Submit"&gt;
                &lt;/form&gt;
            </code>
            </pre>
        </div>
        <div class="box shadow">
            <h2>Seleksi</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="job">Jenis Kelamin</label>
                <select name="job" id="job">
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="ABRI">ABRI</option>
                    <option value="PNS">PNS</option>
                    <option value="Swasta">Swasta</option>
                </select>
                <button type="submit">
                    OK
                </button>
            </form>
            <div class="hasil">
                <div>
                    Hasil :
                </div>
                <?php
                if (isset($_POST['job'])) {
                    echo $_POST['job'];
                }
                ?>
            </div>
        </div>
        <div class="box shadow">
            <h2>Checkbox</h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="hobi">Hobi</label>
                <input type="checkbox" name="hobi[]" value="Membaca">Membaca
                <input type="checkbox" name="hobi[]" value="Menulis">Menulis
                <input type="checkbox" name="hobi[]" value="Menggambar">Menggambar
                <button type="submit">
                    OK
                </button>
            </form>
            <div class="hasil">
                <div>
                    Hasil :
                </div>
                <?php
                if (isset($_POST['hobi'])) {
                    foreach ($_POST['hobi'] as $hobi) {
                        echo $hobi . '<br>';
                    }
                }
                ?>
            </div>
        </div>

    </div>
</body>

</html>