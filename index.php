<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>
<!DOCTYPE html>  
<html lang="id">  
<head>  
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Kuliner Nusantara - Lita A11.2024.16073</title>  
  
  <!-- Link Bootstrap -->  
  <link  
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"  
    rel="stylesheet"  
  >  
  
  <style>  
    .accordion-button:not(.collapsed) {  
      background-color: #dc3545 !important;  
      color: white !important;  
    }  
  
    .accordion-item {  
      background-color: #f8d7da;  
      border: 1px solid #e0aeb2;  
    }  
  
    .accordion-button {  
      transition: all 0.3s ease;  
    }  
  
    .card:hover, .p-4.border:hover {  
      transform: translateY(-5px);  
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);  
      transition: 0.3s ease;  
    }  

    /* ===== TOMBOL TO-TOP ===== */
    #toTopBtn {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 12px 16px;
      border-radius: 50%;
      font-size: 20px;
      cursor: pointer;
      display: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      transition: 0.3s;
      z-index: 999;
    }

    #toTopBtn:hover {
      background-color: #b72d3a;
      transform: scale(1.1);
    }

     
    body.dark-mode {
      background-color: #1b1b1b !important;
      color: #f1f1f1 !important;
    }

    body.dark-mode .navbar {
      background-color: #111 !important;
    }

    body.dark-mode .card {
      background-color: #2d2d2d !important;
      color: white !important;
    }

    body.dark-mode section {
      background-color: #222 !important;
      color: white !important;
    }

    body.dark-mode .accordion-item {
      background-color: #2d2d2d !important;
      border-color: #444 !important;
    }

    body.dark-mode footer {
      background-color: #111 !important;
      }
  </style>  
</head>  
  
<body>  
  
  <!-- Navbar -->  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">  
    <div class="container">  
      <a class="navbar-brand fw-bold" href="#">🍛 Kuliner Nusantara</a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">  
        <span class="navbar-toggler-icon"></span>  
      </button>  
      <div class="collapse navbar-collapse" id="navbarNav">  
        <ul class="navbar-nav ms-auto">  
          <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>  
          <li class="nav-item"><a class="nav-link" href="#makanan">Makanan Khas</a></li>  
          <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>  
          <li class="nav-item"><a class="nav-link" href="#resep">Resep</a></li>  
          <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li>  
          <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>  
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>  
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li> 

          <!-- TOMBOL THEME SWITCHER -->
          <li class="nav-item ms-3">
            <button id="darkBtn" class="btn btn-dark btn-sm">🌙</button>
          </li>
          <li class="nav-item ms-2">
            <button id="lightBtn" class="btn btn-light btn-sm" style="display:none;">☀</button>
        </ul>  
      </div>  
    </div>  
  </nav>  
  
  <!-- Hero Section -->  
  <section id="beranda" class="bg-light text-dark text-center py-5">  
    <div class="container">  
      <h1 class="display-4 fw-bold">Selamat Datang di Kuliner Nusantara</h1>  
      <p class="lead mb-4">Temukan cita rasa khas Indonesia dari Sabang sampai Merauke!</p>  
  
      <!-- Profil Mahasiswa -->  
      <div class="profil mt-4">  
        <img src="https://static.vecteezy.com/system/resources/previews/027/504/684/non_2x/letter-l-restaurant-logo-combined-with-spatula-and-spoon-icon-vector.jpg" alt="Foto Lita" class="rounded-circle shadow mb-3" width="150" height="150">  
        <h3 class="fw-bold mb-1">LITA AYU RAHMAWATI</h3>  
        <p class="mb-1">A11.2024.16073</p>  
        <p class="text-secondary">Teknik Informatika - Universitas Dian Nuswantoro</p>  
      </div>  
  
      <a href="#makanan" class="btn btn-primary mt-3">Jelajahi Sekarang</a>  
  
      <div class="mt-4 text-center">  
        <p class="fw-bold mb-1" id="tanggal-output"></p>  
        <p class="fw-bold" id="jam-output"></p>  
      </div>  
    </div>  
  </section>  
  
  <!-- Makanan Khas -->  
  <!-- Article Kuliner -->
<section id="makanan" class="py-5">
  <div class="container">

    <h2 class="text-center fw-bold mb-4">Article</h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">
   <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
            <!-- col begin -->     
            <div class="col">
                     <div class="card h-10">
                        <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["judul"] ?></h5>
                            <p class="card-text">
                             <?= $row["isi"] ?>    
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">
                              <?= $row["tanggal"] ?> 
                            </small>
                        </div>
                    </div>
                </div>
         <!-- col end -->
             <?php
            }
            ?>
            </div>
        </div>
    </section>

    <!-- gallery -->
     <section id="gallery">
      Gallery
    </section>
   
  <!-- Resep -->  
  <section id="resep" class="bg-light py-5">  
    <div class="container">  
      <h2 class="text-center mb-4">Resep Singkat</h2>  
      <div class="row">  
        <div class="col-md-6">  
          <h5>Gudeg Yogja</h5>  
          <ul>  
            <li>1kg nangka muda</li>  
            <li>5 butir telur ayam rebus</li>  
            <li>2 lembar daun salam</li>  
            <li>3 lembar daun jeruk</li>  
            <li>3 cm lengkuas</li>  
            <li>120g gula jawa</li>  
            <li>santan, bumbu halus, dan rempah lainnya</li>  
          </ul>  
        </div>  
        <div class="col-md-6">  
          <h5>Rendang Padang</h5>  
          <ul>  
            <li>Daging sapi 1 kg</li>  
            <li>Santan kental 1 liter</li>  
            <li>Bumbu halus: cabai, bawang merah, bawang putih, jahe, kunyit</li>  
          </ul>  
        </div>  
         <div class="col-md-6">  
          <h5>Pempek</h5> 
            <ul>
                <li>2 telur ayam</li>
                <li>150g tepung terigu</li>
                <li>300g tepung tapioka</li>
                <li>300ml air</li>
                <li>7 siung bawang putih</li>
                <li>Garam, kaldu, gula</li>
                </ul>
            </div>
        </div>

      </div>  
    </div>  
  </section>  
  
  <!-- Schedule -->  
  <section id="schedule" class="py-5 bg-light">  
    <div class="container text-center">  
      <h2 class="mb-4">📅 Schedule Kegiatan Kuliner</h2>  
      <p class="mb-5">Beberapa kegiatan seru yang dilakukan setiap minggu.</p>  
      <div class="row row-cols-1 row-cols-md-3 g-4">  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>👩‍🍳 Memasak</h5><p>Mencoba resep baru setiap akhir pekan.</p></div></div>  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>📝 Menulis Resep</h5><p>Mencatat kreasi masakan sendiri di buku resep digital.</p></div></div>  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>🍴 Mencicipi Makanan</h5><p>Mencoba kuliner baru dari berbagai daerah.</p></div></div>  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>📸 Berbagi Kuliner</h5><p>Mengunggah foto makanan khas Nusantara.</p></div></div>  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>🍜 Jelajah Kuliner</h5><p>Mengunjungi tempat makan khas daerah.</p></div></div>  
        <div class="col"><div class="p-4 border rounded shadow-sm h-100"><h5>🍰 Festival Makanan</h5><p>Mengikuti acara kuliner tahunan.</p></div></div>  
      </div>  
    </div>  
  </section>  

  <!-- About -->  
  <section id="about" class="py-5 bg-light">  
    <div class="container">  
      <h2 class="text-center mb-4 fw-bold">About Me</h2>  

      <div class="accordion" id="accordionExample">  
        <div class="accordion-item">  
          <h2 class="accordion-header" id="headingOne">  
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">  
              Universitas Dian Nuswantoro Semarang (2024 - Now)  
            </button>  
          </h2>  
          <div id="collapseOne" class="accordion-collapse collapse show">  
            <div class="accordion-body">  
              <strong>This is the first item's accordion body.</strong>  
            </div>  
          </div>  
        </div>  

        <div class="accordion-item">  
          <h2 class="accordion-header" id="headingTwo">  
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">  
              SMK Negeri 3 Semarang (2021 - 2024)  
            </button>  
          </h2>  
          <div id="collapseTwo" class="accordion-collapse collapse">  
            <div class="accordion-body">  
              Selama bersekolah di SMK Negeri 3 Semarang jurusan Teknik Elektro...  
            </div>  
          </div>  
        </div>  

        <div class="accordion-item">  
          <h2 class="accordion-header" id="headingThree">  
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">  
              SMP Negeri 37 Semarang (2018 - 2021)  
            </button>  
          </h2>  
          <div id="collapseThree" class="accordion-collapse collapse">  
            <div class="accordion-body">  
              Di SMP Negeri 37 Semarang saya mulai aktif dalam kegiatan teknologi.  
            </div>  
          </div>  
        </div>  

      </div>  
    </div>  
  </section>  
  
  <!-- Kontak -->  
  <section id="kontak" class="py-5 bg-light">  
    <div class="container">  
      <h2 class="text-center mb-4">Hubungi Kami</h2>  
      <div class="row justify-content-center">  
        <div class="col-md-6">  
          <form>  
            <div class="mb-3">  
              <label for="nama" class="form-label">Nama</label>  
              <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda">  
            </div>  
            <div class="mb-3">  
              <label for="email" class="form-label">Email</label>  
              <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">  
            </div>  
            <div class="mb-3">  
              <label for="pesan" class="form-label">Pesan</label>  
              <textarea class="form-control" id="pesan" rows="3" placeholder="Tuliskan pesan..."></textarea>  
            </div>  
            <button type="submit" class="btn btn-success w-100">Kirim</button>  
          </form>  
        </div>  
      </div>  
    </div>  
  </section>  
  
  <!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Footer -->
<footer class="bg-primary text-light text-center py-3">

  <div class="mb-2">
    <a href="#" class="text-light mx-2"><i class="bi bi-instagram"></i></a>
    <a href="#" class="text-light mx-2"><i class="bi bi-twitter"></i></a>
    <a href="#" class="text-light mx-2"><i class="bi bi-whatsapp"></i></a>
  </div>

  <p class="mb-0">
    &copy; 2025 Kuliner Nusantara | LITA AYU RAHMAWATI - A11.2024.16073 | Teknik Informatika
  </p>
</footer>
 

  <!-- TOMBOL TO-TOP -->
  <button id="toTopBtn">↑</button>

  <!-- Script Bootstrap -->  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
  
  <!-- SCRIPT JAM & TANGGAL OTOMATIS -->  
  <script>  
    function updateWaktu() {  
      const waktu = new Date();  
      const tanggal = waktu.getDate();  
      const bulan = waktu.getMonth();  
      const tahun = waktu.getFullYear();  
      const jam = waktu.getHours();  
      const menit = waktu.getMinutes();  
      const detik = waktu.getSeconds();  
      const arrBulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];  
      const tanggal_full = "Sabtu, " + tanggal + " " + arrBulan[bulan] + " " + tahun;  
      const jam_full =  
        (jam < 10 ? "0" + jam : jam) + ":" +  
        (menit < 10 ? "0" + menit : menit) + ":" +  
        (detik < 10 ? "0" + detik : detik);  
  
      document.getElementById("tanggal-output").innerHTML = tanggal_full;  
      document.getElementById("jam-output").innerHTML = jam_full;  
    }  
    updateWaktu();  
    setInterval(updateWaktu, 1000);  
  </script>

  <!-- SCRIPT TO-TOP -->
  <script>
    let toTop = document.getElementById("toTopBtn");

    window.onscroll = function () {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        toTop.style.display = "block";
      } else {
        toTop.style.display = "none";
      }
    };

    toTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  </script>

  <!-- SCRIPT MODE GELAP -->
  <script>
    const darkBtn = document.getElementById("darkBtn");
    const lightBtn = document.getElementById("lightBtn");
    const body = document.body;

    // Load mode sebelumnya
    if (localStorage.getItem("tema") === "dark") {
      body.classList.add("dark-mode");
      darkBtn.style.display = "none";
      lightBtn.style.display = "inline-block";
    }

    darkBtn.onclick = () => {
      body.classList.add("dark-mode");
      darkBtn.style.display = "none";
      lightBtn.style.display = "inline-block";
      localStorage.setItem("tema", "dark");
    };

    lightBtn.onclick = () => {
      body.classList.remove("dark-mode");
      lightBtn.style.display = "none";
      darkBtn.style.display = "inline-block";
      localStorage.setItem("tema", "light");
    };
  </script>

</body>  
</html>