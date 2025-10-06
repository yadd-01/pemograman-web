// Fungsi untuk ubah teks & style
function ubahKonten() {
  const judul = document.getElementById("judul");
  const paragraf = document.getElementById("paragraf");

  // .textContent -> ubah teks
  judul.textContent = "Judul Berubah!";
  paragraf.textContent = "Paragraf ini juga berubah setelah klik tombol.";

  // .style -> ubah tampilan dinamis
  judul.style.color = "green";
  judul.style.fontSize = "28px";
  paragraf.style.backgroundColor = "#fef3c7";
  paragraf.style.padding = "12px";
  paragraf.style.borderRadius = "8px";

  console.log("Konten berhasil diubah!");
}

// Fungsi reset kembali ke awal
function resetKonten() {
  const judul = document.getElementById("judul");
  const paragraf = document.getElementById("paragraf");

  judul.textContent = "Judul Asli";
  paragraf.textContent = "Ini adalah teks awal paragraf.";

  judul.style.color = "#1f2937";
  judul.style.fontSize = "24px";
  paragraf.style.backgroundColor = "transparent";
  paragraf.style.padding = "0";
  paragraf.style.borderRadius = "0";

  console.log("Konten sudah direset!");
}
