<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pakar Gaya Belajar Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
      color: #000;
      scroll-behavior: smooth;
    }
    nav {
      font-family: 'Poppins', sans-serif;
      position: sticky;
      top: 0;
      background: linear-gradient(90deg, #fddde6, #cce5ff);
      padding: 12px 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      border-bottom: 2px solid #ccc;
      z-index: 1000;
    }
    nav a {
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }
    nav a:hover {
      color: #e07ba6;
    }
    .navbar {
  position: sticky;
  top: 0;
  z-index: 1000;
  background: linear-gradient(90deg, #fddde6, #cce5ff);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  padding: 14px 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

.nav-links {
  display: flex;
  gap: 25px;
  flex: 1;
}

.nav-links a {
  text-decoration: none;
  color: #333;
  font-weight: 600;
  padding: 8px 12px;
  border-radius: 8px;
  transition: background 0.3s, color 0.3s;
}

.nav-links a:hover {
  background-color: rgba(255, 255, 255, 0.6);
  color: #e07ba6;
}

.nav-login button {
  background: linear-gradient(135deg, #f89abf, #69b8ff);
  color: #fff;
  border: none;
  padding: 8px 18px;
  font-weight: bold;
  border-radius: 20px;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.nav-login button:hover {
  transform: translateY(-1px);
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}
@media (max-width: 600px) {
  .navbar {
    flex-direction: column;
    align-items: flex-start;
  }

  .nav-links {
    flex-direction: column;
    gap: 10px;
    width: 100%;
    margin-bottom: 10px;
  }

  .nav-login {
    width: 100%;
    text-align: right;
  }
}

    header {
      background-color: #fddde6;
      padding: 50px 20px;
      text-align: center;
    }
    header h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }
    header p {
      font-size: 20px;
      font-weight: 500;
    }
    section {
      padding: 40px 20px;
      max-width: 1000px;
      margin: auto;
    }
    section h2 {
      color: #3399ff;
    }
    .box, .feature {
      background-color: #fdf0f5;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 25px;
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .box.visible, .feature.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .feature-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }
    .feature {
      background-color: #ffffff;
      border: 2px solid #f89abf;
      border-radius: 10px;
      padding: 15px;
      text-align: center;
      font-weight: bold;
    }
    .btn {
      background-color: #f89abf;
      color: #fff;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
      margin-top: 10px;
    }
    .btn:hover {
      background-color: #e07ba6;
    }
    footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #444;
      border-top: 1px solid #eee;
      margin-top: 40px;
    }
    .komentar input, .komentar textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .comment-list {
      margin-top: 20px;
    }
    .comment-item {
      padding: 12px;
      background: #fefefe;
      border: 1px solid #ddd;
      margin-bottom: 10px;
      border-radius: 8px;
    }
    .like-btn {
      background: none;
      border: none;
      color: #e07ba6;
      cursor: pointer;
      font-weight: bold;
    }
  #pieChart {
    max-width: 400px;
    width: 100%;
    height: auto;
    margin: 0 auto; /* supaya tetap tengah */
    display: block;
  }
  .developer-card {
  display: flex;
  align-items: center;
  gap: 20px;
  margin-top: 20px;
  background: #fff0f5;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  flex-wrap: wrap;
}

.profile-pic {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 100%;
  border: 4px solid #f89abf;
}

.dev-info {
  flex: 1;
}

.dev-info h3 {
  margin: 0;
  color: #e07ba6;
}

.dev-info p {
  margin: 5px 0;
}


  </style>
</head>
<body>

<nav class="navbar">
  <div class="nav-links">
    <a href="#Pengenalan">Pengenalan</a>
    <a href="#fitur">Fitur</a>
    <a href="#statistik">Statistik</a>
    <a href="#testimoni">Testimoni</a>
    <a href="#tentang">Tentang</a>

  </div>
  <div class="nav-login">
    <button onclick="toggleLoginModal()" aria-label="Login atau Daftar">🔐 Login / Daftar</button>
  </div>
</nav>



<div id="loginModal" style="display:none; position:fixed; top:20%; left:50%; transform:translateX(-50%); background:#fff; padding:25px 20px; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.2); z-index:9999; text-align:center;">
  <h3 style="margin-top:0;">Masuk sebagai</h3>
  <a href="mahasiswa/mahasiswa_login.php" class="btn" style="margin-bottom: 10px;">🎓 Mahasiswa</a><br>
  <a href="admin/login.php" class="btn">👤 Admin</a><br><br>
  <button onclick="toggleLoginModal()" style="margin-top:10px; background:none; border:none; color:#888; cursor:pointer;">Tutup</button>
</div>

<header id="Pengenalan">
  <h1>SISTEM PAKAR GAYA BELAJAR MAHASISWA</h1>
  <p><em>Setiap Mahasiswa Punya Gaya Belajar, Kamu yang Mana?</em></p>
  <p><em>Cari Tahu Gaya Belajarmu, Tingkatkan Fokus dan Hasil!</em></p>
</header>

<section>
  <div class="box" id="pengenalan">
  <h2>Selamat Datang</h2>
  <p>
    Temukan gaya belajar terbaikmu dan maksimalkan potensi akademikmu!  
    Sistem ini dirancang khusus untuk membantumu memahami bagaimana kamu menyerap informasi secara efektif — apakah kamu seorang pembelajar visual, auditori, atau kinestetik?
  </p>
  <a href="#" class="btn" onclick="toggleLoginModal()">🧠 Mulai Diagnosa</a>
</div>

  <div class="box" id="fitur">
    <h2>Fitur Unggulan</h2>
    <div class="feature-grid">
      <div class="feature">✅ Diagnosa cepat dan mudah</div>
      <div class="feature">⚡ Hasil langsung tampil</div>
      <div class="feature">📌 Rekomendasi gaya belajar personal</div>
      <div class="feature">🖨 Cetak hasil ke PDF</div>
    </div>
  </div>
  <div class="box" id="statistik">
  <h2>Statistik Diagnosa Gaya Belajar</h2>
  <canvas id="pieChart"></canvas>
</div>

  <div class="box" id="testimoni">
    <h2>Testimoni Mahasiswa</h2>
    <div class="komentar">
      <input type="text" id="nama" placeholder="Nama Anda">
      <textarea id="isiKomentar" rows="3" placeholder="Tulis komentar di sini..."></textarea>
      <button class="btn" onclick="tambahKomentar()">Kirim</button>
    </div>
    <div class="comment-list" id="daftarKomentar"></div>
  </div>
  <div class="box" id="tentang">
  <h2>Tentang Sistem</h2>
  <p>
    Sistem Pakar Gaya Belajar Mahasiswa ini dikembangkan untuk membantu mahasiswa mengenali gaya belajar mereka sendiri berdasarkan gejala dan karakteristik yang dirasakan. Dengan mengetahui gaya belajar, mahasiswa dapat meningkatkan cara belajar mereka dan mencapai hasil akademik yang lebih baik.
  </p>
  <p>
    Sistem ini menggunakan metode forward chaining dalam menganalisis data dan memberikan rekomendasi gaya belajar seperti Visual, Auditori, atau Kinestetik.
  </p>

  <div class="developer-card">
    <img src="img/reni.jpg" alt="Foto Reni" class="profile-pic">
    <div class="dev-info">
      <h3>👩‍💻 Reni Ramadhani Sabila</h3>
      <p>Mahasiswa FIKTI UNIVAL Angkatan 2023</p>
      <p>Developer sistem pakar ini — semangat belajar, semangat berkarya! 💡</p>
    </div>
  </div>
</div>
</section>

<footer>
  <strong>Reni Ramadhani Sabila</strong><br>
  FIKTI UNIVAL 2023 &copy;
</footer>

<script>
function toggleLoginModal() {
  const modal = document.getElementById("loginModal");
  modal.style.display = modal.style.display === "none" ? "block" : "none";
}

document.addEventListener("DOMContentLoaded", function () {
  loadKomentar();
});

function loadKomentar() {
  fetch("komentar/ambil_komentar.php")
    .then(res => res.text())
    .then(html => document.getElementById("daftarKomentar").innerHTML = html);
}

function tambahKomentar() {
  const nama = document.getElementById("nama").value;
  const isi = document.getElementById("isiKomentar").value;
  if (nama.trim() === "" || isi.trim() === "") {
    return alert("Nama dan komentar tidak boleh kosong atau hanya spasi!");
  }

  const form = new FormData();
  form.append("nama", nama);
  form.append("isi", isi);

  fetch("komentar/simpan_komentar.php", { method: "POST", body: form })
    .then(() => {
      document.getElementById("nama").value = "";
      document.getElementById("isiKomentar").value = "";
      loadKomentar();
    });
}

function likeKomentar(id, btn) {
  const form = new FormData();
  form.append("id", id);
  fetch("komentar/like_komentar.php", { method: "POST", body: form })
    .then(() => {
      const span = btn.querySelector("span");
      span.textContent = parseInt(span.textContent) + 1;
    });
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    } else {
      entry.target.classList.remove('visible');
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.box, .feature').forEach(el => observer.observe(el));
</script>
<script>
fetch("grafik_data.php")
  .then(response => response.json())
  .then(data => {
    const ctx = document.getElementById("pieChart").getContext("2d");
    const chart = new Chart(ctx, {
      type: "pie",
      data: {
        labels: data.map(item => item.label),
        datasets: [{
          data: data.map(item => item.jumlah),
          backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#8E44AD", "#2ECC71"],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  })
  .catch(error => console.error("Gagal memuat data statistik:", error));
</script>
</body>
</html>
