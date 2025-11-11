<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
    <style>
        /* CSS Sederhana untuk merapikan tampilan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 130px; /* Lebar label */
            vertical-align: top;
        }
        input[type="text"],
        textarea,
        select {
            width: calc(100% - 150px); /* Lebar input */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            height: 80px;
        }
        input[type="radio"] {
            width: auto;
            margin-left: 0;
        }
        /* Style khusus untuk label radio button */
        label.radio-label {
            width: auto; 
            margin-right: 10px;
        }
        /* Style untuk grup tombol */
        div.buttons {
            text-align: left;
            padding-left: 130px; /* Sejajarkan dengan input */
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
        }
        input[type="reset"] {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Form Pendaftaran Online Mahasiswa Baru</h2>
    
    <form action="soal3-proses.php" method="GET">
        <fieldset>
            <legend>Data Pendaftaran</legend>
            
            <div>
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama">
            </div>
            
            <div>
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir">
            </div>
            
            <div>
                <label>Tanggal Lahir:</label>
                <select name="tgl" required style="width: auto;">
                    <option value="">Tgl</option>
                    <?php for ($i = 1; $i <= 31; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                
                <select name="bln" required style="width: auto;">
                    <option value="">Bln</option>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                
                <select name="thn" required style="width: auto;">
                    <option value="">Thn</option>
                    <?php for ($i = 1980; $i <= 2005; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div>
                <label for="alamat">Alamat Rumah:</label>
                <textarea id="alamat" name="alamat"></textarea>
            </div>
            
            <div>
                <label>Jenis Kelamin:</label>
                <input type="radio" id="pria" name="jk" value="Pria">
                <label for="pria" class="radio-label">Pria</label>
                <input type="radio" id="wanita" name="jk" value="Wanita">
                <label for="wanita" class="radio-label">Wanita</label>
            </div>
            
            <div>
                <label for="sekolah">Asal Sekolah:</label>
                <input type="text" id="sekolah" name="sekolah">
            </div>
            
            <div>
                <label for="uan">Nilai UAN:</label>
                <input type="text" id="uan" name="uan">
            </div>
            
            <div class="buttons">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            
        </fieldset>
    </form>

</body>
</html>