<html>
<head>
    <title>Baca input dari form</title>
</head>
<body>
    <h1>Baca input dari form</h1>

    <p>Berikut ini data yang telah Anda masukkan dalam form</p>

    <?php
        $namaAnda = $_POST['nama']; // membaca input dari komponen nama
        $alamatAnda = $_POST['alamat']; // membaca input dari komponen alamat
        $sexAnda = $_POST['sex']; // membaca input dari komponen sex
        $jobAnda = $_POST['job']; // membaca input dari komponen job
        $statusMenikah = $_POST['status']; // membaca input dari komponen status

        echo "<table>";
        echo "<tr><td>Nama Anda</td><td>:</td><td>".$namaAnda."</td></tr>";
        echo "<tr><td>Alamat Anda</td><td>:</td><td>".$alamatAnda."</td></tr>";
        echo "<tr><td>Jenis Kelamin Anda</td><td>:</td><td>".$sexAnda."</td></tr>";
        echo "<tr><td>Pekerjaan Anda</td><td>:</td><td>".$jobAnda."</td></tr>";
        echo "<tr><td>Status Menikah</td><td>:</td><td>".$statusMenikah."</td></tr>";
        echo "</table>";
    ?>

</body>
</html>