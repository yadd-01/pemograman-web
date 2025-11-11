<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran Terkirim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        /* Menggunakan <pre> agar spasi dan format
           tampil rapi dan sejajar seperti contoh
        */
        pre {
            font-family: "Courier New", Courier, monospace;
            font-size: 1.1em;
            line-height: 1.5;
            background-color: #eee;
            padding: 15px;
            border-radius: 5px;
        }
        h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
        // Periksa apakah data dikirim menggunakan metode GET // Diubah
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
            // 1. Ambil data dari form
            // Gunakan htmlspecialchars untuk keamanan (mencegah XSS)
            // Gunakan 'isset' untuk memeriksa data, jika kosong beri nilai default
            
            // Diubah dari $_POST ke $_GET
            $nama = !empty($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '[tidak diisi]';
            $tempat_lahir = !empty($_GET['tempat_lahir']) ? htmlspecialchars($_GET['tempat_lahir']) : '[tidak diisi]';
            
            // Ambil data tanggal, bulan, tahun // Diubah dari $_POST ke $_GET
            $tgl = !empty($_GET['tgl']) ? htmlspecialchars($_GET['tgl']) : 'TGL';
            $bln = !empty($_GET['bln']) ? htmlspecialchars($_GET['bln']) : 'BLN';
            $thn = !empty($_GET['thn']) ? htmlspecialchars($_GET['thn']) : 'THN';
            // Gabungkan tanggal lahir
            $tanggal_lahir = "$tgl-$bln-$thn";
        
            // Diubah dari $_POST ke $_GET
            $alamat = !empty($_GET['alamat']) ? htmlspecialchars($_GET['alamat']) : '[tidak diisi]';
            $jk = isset($_GET['jk']) ? htmlspecialchars($_GET['jk']) : '[tidak dipilih]';
            $sekolah = !empty($_GET['sekolah']) ? htmlspecialchars($_GET['sekolah']) : '[tidak diisi]';
            $uan = !empty($_GET['uan']) ? htmlspecialchars($_GET['uan']) : '[tidak diisi]';
        
            // 2. Tampilkan output sesuai format
            
            // Menampilkan ucapan terima kasih
            echo "<h2>Terimakasih <strong>" . $nama . "</strong> sudah mengisi form pendaftaran.</h2>";
            
            // Menampilkan semua data yang diisi
            // Kita gunakan <pre> agar format teksnya rapi
            echo "<pre>";
            echo "Nama Lengkap    : $nama\n";
            echo "Tempat Lahir    : $tempat_lahir\n";
            echo "Tanggal Lahir   : $tanggal_lahir\n";
            echo "Alamat Rumah    : $alamat\n";
            echo "Jenis Kelamin   : $jk\n";
            echo "Asal Sekolah    : $sekolah\n";
            echo "Nilai UAN       : $uan";
            echo "</pre>";
            
            echo '<br><a href="SOAL3.php">Kembali ke Form</a>';
        
        } else {
            // Jika file ini diakses langsung tanpa submit, redirect ke form
            echo "<p>Silakan isi form pendaftaran terlebih dahulu.</p>";
            echo '<a href="SOAL3.php">Kembali ke Form</a>';
        }
        ?>
    </div>

</body>
</html>