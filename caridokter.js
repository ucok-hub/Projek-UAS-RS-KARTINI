function initialize() {
  var koordinatTujuan = { lat: -6.238077422724989, lng: 106.7691991230291 }; // RS Kartini
  var propertiPeta = { 
    center: koordinatTujuan,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  var marker = new google.maps.Marker({
    position: koordinatTujuan,
    map: peta,
    title: "Rumah Sakit Kartini"
  });
}

// Daftar nama dokter beserta spesialis
const daftarNamaDokter = [
  { nama: "dr. Amelia Wahyuni, Sp.OG", spesialis: "Kandungan" },
  { nama: "dr. Natasya Prameswari, Sp.OG", spesialis: "Kandungan" },
  { nama: "dr. Tri Yuniarti, Sp.OG", spesialis: "Kandungan" },
  { nama: "dr. June Elita Rahardiyanti, Sp.PD", spesialis: "Penyakit Dalam" },
  { nama: "dr. Laila Miftakhul Jannah, Sp.PD", spesialis: "Penyakit Dalam" },
  { nama: "dr. Daisy Widiastuti , SpA", spesialis: "Anak" },
  { nama: "drg. Anna Purnamaningsih", spesialis: "Gigi" },
  { nama: "drg. Rustiana Tri Widijanti", spesialis: "Gigi" },
  { nama: "dr. Asian Edward Sagala, Sp.B", spesialis: "Penyakit Bedah" },
  { nama: "dr. Andoko Budiwisesa, Sp.B", spesialis: "Penyakit Bedah" }
];

function showNamaDropdown() {
  const input = document.getElementById('searchNamaDokter');
  const dropdown = document.getElementById('namaDropdown');
  const spesialis = document.getElementById('filterSpesialis').value.toLowerCase();
  const val = input.value.trim().toLowerCase();

  // Filter dokter sesuai spesialis
  let filteredDokter = daftarNamaDokter;
  if (spesialis) {
    filteredDokter = filteredDokter.filter(d => d.spesialis.toLowerCase().includes(spesialis));
  }

  // Filter berdasarkan input nama
  const filtered = val
    ? filteredDokter.filter(d => d.nama.toLowerCase().includes(val))
    : filteredDokter;

  if (filtered.length === 0) {
    dropdown.style.display = "none";
    return;
  }
  dropdown.innerHTML = "";
  filtered.forEach(dokter => {
    const item = document.createElement('div');
    item.textContent = dokter.nama;
    item.style.padding = "8px 12px";
    item.style.cursor = "pointer";
    item.onmousedown = function(e) {
      e.preventDefault();
      input.value = dokter.nama;
      dropdown.style.display = "none";
    };
    item.onmouseover = function() {
      this.style.background = "#f7f7f7";
    };
    item.onmouseout = function() {
      this.style.background = "#fff";
    };
    dropdown.appendChild(item);
  });
  // Posisi dropdown tepat di bawah input
  const rect = input.getBoundingClientRect();
  dropdown.style.left = rect.left + window.scrollX + "px";
  dropdown.style.top = (rect.bottom + window.scrollY) + "px";
  dropdown.style.width = rect.width + "px";
  dropdown.style.display = "block";
}

// Update dropdown nama dokter saat filter spesialis berubah
document.getElementById('filterSpesialis').addEventListener('change', function() {
  showNamaDropdown();
  // Kosongkan input nama dokter jika ingin reset pencarian nama saat ganti spesialis
  // document.getElementById('searchNamaDokter').value = '';
});

// Sembunyikan dropdown jika klik di luar
document.addEventListener('mousedown', function(e) {
  const dropdown = document.getElementById('namaDropdown');
  const input = document.getElementById('searchNamaDokter');
  if (!dropdown.contains(e.target) && e.target !== input) {
    dropdown.style.display = "none";
  }
});

function filterDokter() {
  const namaInput = document.getElementById('searchNamaDokter').value.toLowerCase();
  const spesialis = document.getElementById('filterSpesialis').value.toLowerCase();

  document.querySelectorAll('.card_dokter').forEach(card => {
    const namaDokter = card.querySelector('h3').textContent.toLowerCase();
    const spesialisDokter = card.querySelector('.spesialis').textContent.toLowerCase();

    const cocokNama = !namaInput || namaDokter.includes(namaInput);
    const cocokSpesialis = !spesialis || spesialisDokter.includes(spesialis);
    card.style.display = (cocokNama && cocokSpesialis) ? '' : 'none';
  });
}
