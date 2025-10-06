const tombol = document.getElementById('btn');
const teks = document.getElementById('teks');

tombol.addEventListener('click', function() {
    teks.textContent = "teks berhasil di ubah dengan javascript";
    teks.style.color = "green";
});
    