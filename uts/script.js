console.log("Page loaded");

const form = document.getElementById("formData");
const tabel = document.getElementById("dataTabel");

function saveData(data) {
    let list = JSON.parse(localStorage.getItem('data')) || [];
    list.push(data);
    localStorage.setItem('data', JSON.stringify(list));
}

function loadData() {
    const list = JSON.parse(localStorage.getItem('data')) || [];
    tabel.innerHTML = '';
    list.forEach((item, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${index + 1}</td><td>${item.nama}</td><td>${item.nim}</td><td>${item.semester}</td><td>${item.programStudi}</td><td>${item.email}</td>`;
        tabel.appendChild(row);
    });
}

document.addEventListener('DOMContentLoaded', loadData);

form.addEventListener("submit", function(e) {
    e.preventDefault();
    const nama = document.getElementById("nama").value;
    const nim = document.getElementById("nim").value;
    const semester = document.getElementById("semester").value;
    const programStudi = document.getElementById("programStudi").value;
    const email = document.getElementById("email").value;
    const data = {nama, nim, semester, programStudi, email};
    saveData(data);
    console.log("Submitted:", data);
    loadData();
    form.reset();
});

setTimeout(() => console.warn("3 seconds passed"), 3000);
setInterval(() => console.log("Time:", new Date().toLocaleTimeString()), 5000);
