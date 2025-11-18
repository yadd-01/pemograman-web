<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perhitungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            min-height: 100vh;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            background-color: #2d2d2d;
            border-bottom: 1px solid #333;
            color: #ffffff;
            font-weight: 600;
        }
        .form-control, .form-select {
            background-color: #2d2d2d;
            border: 1px solid #444;
            color: #e0e0e0;
        }
        .form-control:focus, .form-select:focus {
            background-color: #2d2d2d;
            border-color: #0d6efd;
            color: #e0e0e0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .result {
            background-color: #2d2d2d;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            border-left: 4px solid #0d6efd;
        }
        .table {
            color: #e0e0e0;
        }
        .table th {
            background-color: #2d2d2d;
            border-color: #444;
        }
        .table td {
            background-color: #1e1e1e;
            border-color: #444;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center py-3">
                <h2 class="mb-0">Form Perhitungan</h2>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Masukkan Tahun:</label>
                                <input type="number" class="form-control" id="tahun" name="tahun" min="1" value="<?php echo isset($_POST['tahun']) ? $_POST['tahun'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jam_kerja" class="form-label">Jumlah Jam Kerja (per minggu):</label>
                                <input type="number" class="form-control" id="jam_kerja" name="jam_kerja" min="0" step="0.5" value="<?php echo isset($_POST['jam_kerja']) ? $_POST['jam_kerja'] : ''; ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jam_kerja_gol" class="form-label">Jumlah Jam Kerja (dengan golongan):</label>
                                <input type="number" class="form-control" id="jam_kerja_gol" name="jam_kerja_gol" min="0" step="0.5" value="<?php echo isset($_POST['jam_kerja_gol']) ? $_POST['jam_kerja_gol'] : ''; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="golongan" class="form-label">Golongan:</label>
                                <select class="form-select" id="golongan" name="golongan" required>
                                    <option value="">Pilih Golongan</option>
                                    <option value="A" <?php echo (isset($_POST['golongan']) && $_POST['golongan'] == 'A') ? 'selected' : ''; ?>>A (Rp. 4.000/jam)</option>
                                    <option value="B" <?php echo (isset($_POST['golongan']) && $_POST['golongan'] == 'B') ? 'selected' : ''; ?>>B (Rp. 5.000/jam)</option>
                                    <option value="C" <?php echo (isset($_POST['golongan']) && $_POST['golongan'] == 'C') ? 'selected' : ''; ?>>C (Rp. 6.000/jam)</option>
                                    <option value="D" <?php echo (isset($_POST['golongan']) && $_POST['golongan'] == 'D') ? 'selected' : ''; ?>>D (Rp. 7.500/jam)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg" name="hitung">Hitung Semua</button>
                    </div>
                </form>
                
                <?php
                if (isset($_POST['hitung'])) {
                    echo '<div class="mt-4">';
                    
                    // Soal 1: Tahun Kabisat
                    if (isset($_POST['tahun'])) {
                        $tahun = $_POST['tahun'];
                        
                        if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
                            $hasil_tahun = "Tahun $tahun adalah tahun kabisat.";
                            $class_tahun = "alert-success";
                        } else {
                            $hasil_tahun = "Tahun $tahun bukan tahun kabisat.";
                            $class_tahun = "alert-danger";
                        }
                        
                        echo "<div class='result alert $class_tahun'><strong>Hasil Cek Tahun:</strong> $hasil_tahun</div>";
                    }
                    
                    // Soal 2: Upah Karyawan
                    if (isset($_POST['jam_kerja'])) {
                        $jam_kerja = $_POST['jam_kerja'];
                        $upah_per_jam = 2000;
                        $upah_lembur_per_jam = 3000;
                        $jam_normal = 48;
                        
                        if ($jam_kerja <= $jam_normal) {
                            $total_upah = $jam_kerja * $upah_per_jam;
                            $hasil_upah = "Total upah: Rp. " . number_format($total_upah, 0, ',', '.') . ",-";
                        } else {
                            $jam_lembur = $jam_kerja - $jam_normal;
                            $total_upah = ($jam_normal * $upah_per_jam) + ($jam_lembur * $upah_lembur_per_jam);
                            $hasil_upah = "Total upah: Rp. " . number_format($total_upah, 0, ',', '.') . ",- (Termasuk " . $jam_lembur . " jam lembur)";
                        }
                        
                        echo "<div class='result alert alert-info'><strong>Hasil Perhitungan Upah:</strong> $hasil_upah</div>";
                    }
                    
                    // Soal 3: Upah Karyawan dengan Golongan
                    if (isset($_POST['jam_kerja_gol']) && isset($_POST['golongan'])) {
                        $jam_kerja = $_POST['jam_kerja_gol'];
                        $golongan = $_POST['golongan'];
                        $upah_lembur_per_jam = 3000;
                        $jam_normal = 48;
                        
                        // Tentukan upah per jam berdasarkan golongan
                        switch ($golongan) {
                            case 'A':
                                $upah_per_jam = 4000;
                                break;
                            case 'B':
                                $upah_per_jam = 5000;
                                break;
                            case 'C':
                                $upah_per_jam = 6000;
                                break;
                            case 'D':
                                $upah_per_jam = 7500;
                                break;
                            default:
                                $upah_per_jam = 0;
                        }
                        
                        if ($jam_kerja <= $jam_normal) {
                            $total_upah = $jam_kerja * $upah_per_jam;
                            $hasil_upah_gol = "Total upah: Rp. " . number_format($total_upah, 0, ',', '.') . ",-";
                        } else {
                            $jam_lembur = $jam_kerja - $jam_normal;
                            $total_upah = ($jam_normal * $upah_per_jam) + ($jam_lembur * $upah_lembur_per_jam);
                            $hasil_upah_gol = "Total upah: Rp. " . number_format($total_upah, 0, ',', '.') . ",- (Termasuk " . $jam_lembur . " jam lembur)";
                        }
                        
                        echo "<div class='result alert alert-warning'><strong>Hasil Perhitungan Upah dengan Golongan $golongan:</strong> $hasil_upah_gol</div>";
                    }
                    
                    // Soal 4: Jumlah Hari dalam Bulan
                    $bulan_sekarang = date('n');
                    $tahun_sekarang = date('Y');
                    
                    switch ($bulan_sekarang) {
                        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                            $jumlah_hari = 31;
                            $nama_bulan = date('F');
                            break;
                        case 4: case 6: case 9: case 11:
                            $jumlah_hari = 30;
                            $nama_bulan = date('F');
                            break;
                        case 2:
                            if (($tahun_sekarang % 4 == 0 && $tahun_sekarang % 100 != 0) || ($tahun_sekarang % 400 == 0)) {
                                $jumlah_hari = 29;
                            } else {
                                $jumlah_hari = 28;
                            }
                            $nama_bulan = date('F');
                            break;
                        default:
                            $jumlah_hari = 0;
                            $nama_bulan = "Tidak diketahui";
                    }
                    
                    echo "<div class='result alert alert-secondary'><strong>Jumlah Hari Bulan Ini:</strong> Bulan $nama_bulan $tahun_sekarang memiliki $jumlah_hari hari.</div>";
                    
                    echo '</div>';
                }
                ?>
                
                <div class="mt-4">
                    <h5 class="mb-3">Ringkasan Perhitungan</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jenis Perhitungan</th>
                                    <th>Input</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['hitung'])) {
                                    // Baris 1: Tahun Kabisat
                                    echo "<tr>";
                                    echo "<td>Cek Tahun Kabisat</td>";
                                    echo "<td>Tahun: " . (isset($_POST['tahun']) ? $_POST['tahun'] : '-') . "</td>";
                                    echo "<td>" . (isset($hasil_tahun) ? $hasil_tahun : '-') . "</td>";
                                    echo "</tr>";
                                    
                                    // Baris 2: Upah Karyawan
                                    echo "<tr>";
                                    echo "<td>Perhitungan Upah</td>";
                                    echo "<td>Jam Kerja: " . (isset($_POST['jam_kerja']) ? $_POST['jam_kerja'] : '-') . " jam</td>";
                                    echo "<td>" . (isset($hasil_upah) ? $hasil_upah : '-') . "</td>";
                                    echo "</tr>";
                                    
                                    // Baris 3: Upah dengan Golongan
                                    echo "<tr>";
                                    echo "<td>Perhitungan Upah dengan Golongan</td>";
                                    echo "<td>Jam Kerja: " . (isset($_POST['jam_kerja_gol']) ? $_POST['jam_kerja_gol'] : '-') . " jam, Golongan: " . (isset($_POST['golongan']) ? $_POST['golongan'] : '-') . "</td>";
                                    echo "<td>" . (isset($hasil_upah_gol) ? $hasil_upah_gol : '-') . "</td>";
                                    echo "</tr>";
                                    
                                    // Baris 4: Jumlah Hari
                                    echo "<tr>";
                                    echo "<td>Jumlah Hari Bulan Ini</td>";
                                    echo "<td>Bulan: " . date('F Y') . "</td>";
                                    echo "<td>$jumlah_hari hari</td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>Isi form dan klik 'Hitung Semua' untuk melihat hasil</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>