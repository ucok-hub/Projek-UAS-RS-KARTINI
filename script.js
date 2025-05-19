function cari() {
  const input = document.getElementById("cariDokter").value;
  const hasil = document.getElementById("hasilCari");

  if (input.trim() === "") {
    hasil.textContent = "Silakan masukkan nama dokter.";
  } else {
    hasil.textContent = `Hasil pencarian untuk: ${input}`;
  }
}

const contentData = {
  Fisioterapi: {
    title: "Fisioterapi",
    description:
      "Unit rawat inap kami yang dilengkapi berbagai fasilitas untuk meningkatkan kenyamanan Anda selama perawatan di RSUI.",
    images: [
      "https://via.placeholder.com/400x250?text=Admisi+1",
      "https://via.placeholder.com/200x150?text=Admisi+2",
      "https://via.placeholder.com/200x150?text=Admisi+3",
      "https://via.placeholder.com/200x150?text=Admisi+4",
    ],
  },
  radiologi: {
    title: "Radiologi",
    description:
      "Pemeriksaan radiologi lengkap seperti CT-Scan, MRI, dan X-ray untuk diagnosis tepat.",
    images: [
      "https://via.placeholder.com/400x250?text=Hemodialisis+1",
      "https://via.placeholder.com/200x150?text=Hemodialisis+2",
    ],
  },
  lab: {
    title: "Laboratorium",
    description:
      "Laboratorium modern untuk menunjang diagnosis penyakit dengan hasil cepat dan akurat.",
    images: ["https://via.placeholder.com/400x250?text=Lab+1"],
  },
  farmasi: {
    title: "Farmasi",
    description:
      "Pelayanan farmasi 24 jam dengan berbagai obat generik dan paten berkualitas.",
    images: ["https://via.placeholder.com/400x250?text=Farmasi+1"],
  },
  radiologi: {
    title: "Radiologi",
    description:
      "Pemeriksaan radiologi lengkap seperti CT-Scan, MRI, dan X-ray untuk diagnosis tepat.",
    images: [
      "Asset/Ruang Radiologi.jpg",,
    ],
  },
  rawatInap: {
    title: "Rawat Inap",
    description:
      "Kami menyediakan kamar rawat inap yang bersih dan nyaman, dengan peralatan medis lengkap dan privasi bagi pasien.",
    images: ["Asset/Ruang rawat inap.jpg"],
  },
  babySpa: {
    title: "Baby Spa",
    description:
      "Layanan Baby Spa untuk bayi Anda dengan fasilitas steril, aman, dan diawasi oleh terapis profesional.",
    images: ["Asset/"],
  },
};

function showContent(key, element) {
  const data = contentData[key];
  const contentArea = document.getElementById("content-area");

  // Update sidebar active state
  document
    .querySelectorAll(".sidebar li")
    .forEach((li) => li.classList.remove("active"));
  if (element) {
    element.classList.add("active");
  }

  // Build HTML content
  let detailLink = "";
  if (key.toLowerCase() === "radiologi") {
    detailLink = `<a href="detailradiologi.php" class="btn-selengkapnya">Selengkapnya</a>`;
  } else {
    detailLink = `<a href="#" class="btn-selengkapnya" onclick="alert('Detail belum tersedia!');return false;">Selengkapnya</a>`;
  }

  contentArea.innerHTML = `
    <h2>${data.title}</h2>
    <p>${data.description}</p>
    ${detailLink}
    <div class="images">
      ${data.images
        .map((src) => `<img src="${src}" alt="${data.title}">`)
        .join("")}
    </div>
  `;
}

// Show default
window.onload = () => {
  const sidebarItems = document.querySelectorAll(".sidebar li");
  showContent("Fisioterapi", sidebarItems[0]);
};

// Show read more
function readMore() {
  alert("Fitur belum tersedia. Akan diarahkan ke halaman artikel penuh.");
}


