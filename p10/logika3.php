<?php
$bil = 12;
if ($bil==10) {
    echo "Bilangan sama dengan 10";
} else {
    echo "Bilangan tidak sama dengan 10";
}
?>






<?php
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
        // Periksa tahun kabisat untuk Februari
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