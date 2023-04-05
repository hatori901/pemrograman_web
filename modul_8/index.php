<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HTML</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        pre {
            background-color: #4444;
            padding: 10px;
            border-radius: 5px;
        }

        .text-center {
            text-align: center;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 10px 20px;
        }

        .box {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .shadow {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .hasil {
            background-color: #4444;
            padding: 10px;
            border-radius: 5px;
        }

        @media print {
            pre {
                background-color: #4444 !important;
                print-color-adjust: exact;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <p style="font-weight: bold;">Nama : Erwin Alam Syah Putra</p>
        <p style="font-weight: bold;">NIM : 22537141008</p>
        <h1 class="text-center">Latihan PHP</h1>
        <div class="box shadow">
            <h2>PHP Echo</h2>
            <p>PHP echo adalah perintah untuk menampilkan output ke layar.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                echo "Hello World";
            ?&gt;
            </code> 
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php echo "Hello World"; ?>
            </div>
        </div>
        <div class="box shadow">
            <h2>Variable PHP</h2>
            <p>Variable adalah tempat untuk menyimpan data.</p>

            Code :
            <pre>
            <code>
            &lt;?php
                $nama = "Rizky";
                $umur = 20;
                echo "Nama saya $nama, umur saya $umur tahun";
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $nama = "Rizky";
                $umur = 20;
                echo "Nama saya $nama, umur saya $umur tahun";
                ?>
            </div>

            <h3>
                var_dump dan print_r
            </h3>
            <p>var_dump dan print_r adalah fungsi untuk menampilkan isi dari variable.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $nama = "Rizky";
                $umur = 20;
                var_dump($nama);
                echo "<br>";
                print_r($umur);
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $nama = "Rizky";
                $umur = 20;
                var_dump($nama);
                echo "<br>";
                print_r($umur);
                ?>
            </div>
            <i>
                perbedaan var_dump dan print_r adalah var_dump akan menampilkan tipe data dari variable, sedangkan
                print_r
                tidak menampilkan tipe data dari variable.
            </i>
        </div>
        <div class="box shadow">
            <h2>Tipe Data dan Casting</h2>
            <p>Tipe data adalah jenis data yang akan disimpan dalam variable.</p>

            Code :
            <pre>
            <code>
            &lt;?php
                $nama = "Rizky"; //string
                $umur = 20; //integer
                $tinggi = 1.7; //float
                $menikah = false; //boolean
                $hobi = ["makan", "tidur", "main"]; //array
                $alamat = (object) ["jalan" => "Jl. abc", "kota" => "Bandung"]; //object
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $nama = "Rizky"; //string
                $umur = 20; //integer
                $tinggi = 1.7; //float
                $menikah = false; //boolean
                $hobi = ["makan", "tidur", "main"]; //array
                $alamat = (object) ["jalan" => "Jl. abc", "kota" => "Bandung"]; //object
                var_dump($nama);
                echo "<br>";
                var_dump($umur);
                echo "<br>";
                var_dump($tinggi);
                echo "<br>";
                var_dump($menikah);
                is_bool($menikah);
                echo "<br>";
                var_dump($hobi);
                echo "<br>";
                var_dump($alamat);
                ?>
            </div>

            <h3>
                Casting
            </h3>
            <p>Casting adalah mengubah tipe data dari variable.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $bill = "1000";

                $bill = (int) $bill;
                var_dump($bill);
                
                $bill = (float) $bill;
                var_dump($bill);

                $bill = (string) $bill;
                var_dump($bill);
            ?&gt;
            </code>
            </pre>

            Hasilnya :

            <div class="hasil">
                <?php
                $bill = "1000";

                $bill = (int) $bill;
                var_dump($bill);
                echo "<br>";
                $bill = (float) $bill;
                var_dump($bill);
                echo "<br>";
                $bill = (string) $bill;
                var_dump($bill);
                ?>
            </div>

        </div>

        <div class="box shadow">
            <h2>Pernyataan Seleksi</h2>
            <p>Pernyataan seleksi adalah pernyataan yang digunakan untuk mengambil keputusan.</p>

            <h3>
                if else
            </h3>
            <p>if else adalah pernyataan seleksi yang digunakan untuk mengecek kondisi.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $nilai = 80;
                if ($nilai > 80) {
                    echo "Nilai anda A";
                } else if ($nilai > 70) {
                    echo "Nilai anda B";
                } else if ($nilai > 60) {
                    echo "Nilai anda C";
                } else if ($nilai > 50) {
                    echo "Nilai anda D";
                } else {
                    echo "Nilai anda E";
                }
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $nilai = 80;
                if ($nilai > 80) {
                    echo "Nilai anda A";
                } else if ($nilai > 70) {
                    echo "Nilai anda B";
                } else if ($nilai > 60) {
                    echo "Nilai anda C";
                } else if ($nilai > 50) {
                    echo "Nilai anda D";
                } else {
                    echo "Nilai anda E";
                }
                ?>
            </div>

            <h3>
                switch case
            </h3>
            <p> switch case adalah pernyataan seleksi yang digunakan untuk mengecek kondisi.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $nilai = 80;
                switch ($nilai) {
                    case 80:
                        echo "Nilai anda A";
                        break;
                    case 70:
                        echo "Nilai anda B";
                        break;
                    case 60:
                        echo "Nilai anda C";
                        break;
                    case 50:
                        echo "Nilai anda D";
                        break;
                    default:
                        echo "Nilai anda E";
                        break;
                }
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $nilai = 80;
                switch ($nilai) {
                    case 80:
                        echo "Nilai anda A";
                        break;
                    case 70:
                        echo "Nilai anda B";
                        break;
                    case 60:
                        echo "Nilai anda C";
                        break;
                    case 50:
                        echo "Nilai anda D";
                        break;
                    default:
                        echo "Nilai anda E";
                        break;
                }
                ?>
            </div>
        </div>

        <div class="box shadow">
            <h2>Perulangan</h2>
            <p>Perulangan adalah pernyataan yang digunakan untuk mengulang kode.</p>

            <h3>
                for
            </h3>

            <p>for adalah perulangan yang digunakan untuk mengulang kode sebanyak jumlah yang ditentukan.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                for ($i = 0; $i < 10; $i++) {
                    echo "Perulangan ke $i &lt;br&gt;"; 
                }
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                for ($i = 0; $i < 10; $i++) {
                    echo "Perulangan ke $i <br>";
                }
                ?>
            </div>

            <h3>
                foreach
            </h3>

            <p>foreach adalah perulangan yang digunakan untuk mengulang kode sebanyak jumlah array.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $array = ["satu", "dua", "tiga", "empat", "lima"];
                foreach ($array as $value) {
                    echo "$value &lt;br&gt;";
                }
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $array = ["satu", "dua", "tiga", "empat", "lima"];
                foreach ($array as $value) {
                    echo "$value <br>";
                }
                ?>
            </div>

            <h3>
                while
            </h3>

            <p>while adalah perulangan yang digunakan untuk mengulang kode selama kondisi bernilai true.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $i = 0;
                while ($i < 10) {
                    echo "Perulangan ke $i &lt;br&gt;";
                    $i++;
                }
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $i = 0;
                while ($i < 10) {
                    echo "Perulangan ke $i <br>";
                    $i++;
                }
                ?>
            </div>

            <h3>
                do while
            </h3>

            <p>do while adalah perulangan yang digunakan untuk mengulang kode selama kondisi bernilai true.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                $i = 0;
                do {
                    echo "Perulangan ke $i &lt;br&gt;";
                    $i++;
                } while ($i < 10);
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                $i = 0;
                do {
                    echo "Perulangan ke $i <br>";
                    $i++;
                } while ($i < 10);
                ?>
            </div>
        </div>
        <div class="box shadow">
            <h2>Fungsi</h2>
            <p>Fungsi adalah blok kode yang digunakan untuk melakukan tugas tertentu.</p>

            <h3>
                Fungsi tanpa parameter
            </h3>

            <p>Fungsi tanpa parameter adalah fungsi yang tidak memiliki parameter.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                function do_print()
                {
                    echo "Halo Dunia";
                }
                do_print();
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                function do_print()
                {
                    echo "Halo Dunia";
                }
                do_print();
                ?>
            </div>

            <h3>
                Fungsi dengan parameter
            </h3>

            <p>Fungsi dengan parameter adalah fungsi yang memiliki parameter.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                function halo_dunia($nama)
                {
                    echo "Halo $nama";
                }
                halo_dunia("Dunia");
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                function halo_dunia($nama)
                {
                    echo "Halo $nama";
                }
                halo_dunia("Dunia");
                ?>
            </div>

            <h3>
                Fungsi dengan return
            </h3>

            <p>Fungsi dengan return adalah fungsi yang mengembalikan nilai.</p>
            Code :
            <pre>
            <code>
            &lt;?php
                function halo($nama)
                {
                    return "Halo $nama";
                }
                echo halo("Dunia");
            ?&gt;
            </code>
            </pre>

            Hasilnya :
            <div class="hasil">
                <?php
                function halo($nama)
                {
                    return "Halo $nama";
                }
                echo halo("Dunia");
                ?>
            </div>
        </div>
    </div>
</body>

</html>