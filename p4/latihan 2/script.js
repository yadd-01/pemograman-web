function runExercises() {
  console.clear(); // bersihkan console sebelum jalan

  // SOAL 1: const
  const universitas = "Universitas Muhammadiyah Kalimantan Timur";
  console.log("Nama Universitas:", universitas);

  // SOAL 2: let
  let jumlahMahasiswa = 25;
  jumlahMahasiswa = jumlahMahasiswa + 5;
  console.log("Jumlah mahasiswa sekarang:", jumlahMahasiswa);

  // SOAL 3: String
  let namaLengkap = "Ahmad Sahroni";
  console.log("Halo, nama saya " + namaLengkap);

  // SOAL 4: Number
  let angka1 = 10;
  let angka2 = 5;
  console.log("Hasil penjumlahan:", angka1 + angka2);
  console.log("Hasil pengurangan:", angka1 - angka2);
  console.log("Hasil perkalian:", angka1 * angka2);
  console.log("Hasil pembagian:", angka1 / angka2);

  // SOAL 5: Boolean
  let nilaiUjian = 80;
  let lulus = nilaiUjian >= 70;
  console.log("Apakah lulus?", lulus);
}
