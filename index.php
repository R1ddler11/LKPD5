<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Media Pembelajaran</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      padding: 60px 20px;
      border-radius: 15px;
    }
    .card:hover {
      transform: scale(1.03);
      transition: 0.3s;
    }
        :root{
        --bg:#07080a;
        --surface:#0f1720;
        --card:#111827;
        --muted:#98a0ad;
        --accent:#6f42c1;
        --glass: rgba(255,255,255,0.04);
    }

    /* Page background (override Bootstrap) */
    body{
        background: radial-gradient(1200px 400px at 10% 10%, rgba(111,66,193,0.12), transparent),
                                linear-gradient(180deg, #020203 0%, var(--bg) 100%);
        color: #e6eef8;
        transition: background .35s, color .35s;
    }

    /* Navbar tweaks (keeps existing markup but darkened) */
    .navbar {
        background: linear-gradient(90deg, rgba(10,10,12,0.95), rgba(20,16,28,0.95));
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }
    .navbar .navbar-brand,
    .navbar .nav-link {
        color: #e6eef8 !important;
    }
    .navbar .nav-link.active { color: var(--accent) !important; font-weight:600; }

    /* Hero replacement style */
    .revamp-hero {
        background: linear-gradient(135deg, rgba(111,66,193,0.18), rgba(10,10,12,0.4));
        border: 1px solid rgba(255,255,255,0.03);
        backdrop-filter: blur(6px);
        padding: 56px 28px;
        border-radius: 14px;
        box-shadow: 0 8px 30px rgba(2,6,23,0.6);
    }
    .revamp-hero h1 {
        font-size: clamp(1.6rem, 3.6vw, 2.4rem);
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }
    .revamp-hero p.lead { color: var(--muted); margin-bottom: 18px; }
    .btn-accent {
        background: linear-gradient(90deg,var(--accent), #2d7bf6);
        border: none;
        color: #fff;
        box-shadow: 0 6px 20px rgba(111,66,193,0.18);
    }

    /* Cards area */
    .revamp-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(240px,1fr)); gap:20px; }
    .revamp-card {
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
        border: 1px solid rgba(255,255,255,0.03);
        color: #e7eefb;
        padding: 0;
        border-radius: 12px;
        overflow: hidden;
        transition: transform .25s, box-shadow .25s;
    }
    .revamp-card:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 18px 40px rgba(2,6,23,0.6);
    }
    .revamp-card .thumb {
        height: 140px;
        background-size: cover;
        background-position: center;
        filter: saturate(0.9) contrast(1.03);
    }
    .revamp-card .body {
        padding: 16px;
    }
    .revamp-card h5 { margin-bottom: 6px; }
    .revamp-card p { color: var(--muted); font-size: .95rem; margin-bottom: 12px; }

    /* Small utilities */
    .muted { color: var(--muted); }
    .section-title { color: #dfe9ff; letter-spacing: -0.3px; margin-bottom: 14px; }
    .glass-panel {
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
        border: 1px solid rgba(255,255,255,0.03);
        padding: 14px;
        border-radius: 12px;
    }

    /* Floating theme toggle */
    #themeToggle {
        position: fixed;
        right: 18px;
        bottom: 24px;
        z-index: 1200;
        border: none;
        width: 54px;
        height: 54px;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.01));
        color: #fff;
        box-shadow: 0 8px 26px rgba(2,6,23,0.55);
        cursor: pointer;
        display: grid;
        place-items: center;
        font-size: 20px;
        transition: transform .18s;
    }
    #themeToggle:active { transform: scale(.96); }

    /* Footer override (dark-themed) */
    footer {
        background: linear-gradient(90deg, rgba(111,66,193,0.14), rgba(45,123,246,0.06));
        border-top: 1px solid rgba(255,255,255,0.03);
        color: #e6eef8;
    }
    footer p { margin: 0; color: rgba(230,238,248,0.95); font-size: .95rem; }

    /* Responsive tweaks */
    @media (max-width: 767px){
        .revamp-hero { padding: 28px 16px; }
        #themeToggle { right: 12px; bottom: 12px; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Media Belajar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
          
          <!-- Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="kelasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kelas
            </a>
            <ul class="dropdown-menu" aria-labelledby="kelasDropdown">
              <li><a class="dropdown-item" href="tab.php">Kelas X</a></li>
              <li><a class="dropdown-item" href="tab.php">Kelas XI</a></li>
              <li><a class="dropdown-item" href="tab.php">Kelas XII</a></li>
            </ul>
          </li>
          
          <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tugas</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="login.html">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="container my-4">
    <div class="hero text-center shadow">
      <h1 class="fw-bold">Selamat Datang di Media Pembelajaran</h1>
      <p class="lead">Akses materi, tugas, dan berbagai sumber belajar dengan mudah dan cepat.</p>
      <a href="#" class="btn btn-light btn-lg mt-3">Mulai Belajar</a>
    </div>
  </div>

  <!-- Card Materi -->
  <div class="container my-5">
    <h2 class="mb-4 text-center">Materi Terkini</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow h-100">
          <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="materi 1">
          <div class="card-body">
            <h5 class="card-title">Dasar-dasar Komputer</h5>
            <p class="card-text">Pelajari konsep dasar perangkat keras dan perangkat lunak komputer.</p>
            <a href="#" class="btn btn-primary">Lihat Materi</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card shadow h-100">
          <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="materi 2">
          <div class="card-body">
            <h5 class="card-title">Jaringan Komputer</h5>
            <p class="card-text">Memahami cara kerja jaringan komputer dan internet.</p>
            <a href="#" class="btn btn-primary">Lihat Materi</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card shadow h-100">
          <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="materi 3">
          <div class="card-body">
            <h5 class="card-title">Pemrograman Dasar</h5>
            <p class="card-text">Belajar dasar-dasar logika pemrograman dengan contoh praktis.</p>
            <a href="#" class="btn btn-primary">Lihat Materi</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Optional quick panels: ringkas Tugas dan Profil tanpa mengulangi materi utama -->
<div class="container my-5">
    <div class="row g-4 align-items-start">
        <div class="col-lg-8">
            <!-- New dark hero (will replace existing hero by script if present) -->
            <div class="revamp-hero glass-panel shadow-sm">
                <h1 class="fw-bold">Selamat Datang di Media Pembelajaran</h1>
                <p class="lead">Akses materi, tugas, dan berbagai sumber belajar dengan mudah dan cepat.</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="#" class="btn btn-accent btn-lg">Mulai Belajar</a>
                    <a href="#" class="btn btn-outline-light">Jelajahi Kelas</a>
                </div>
            </div>

            <!-- Revamped Materi cards (script will replace original Materi Terkini block) -->
            <div class="mt-4">
                <h2 class="section-title">Materi Terkini</h2>
                <div class="revamp-grid" id="revampMateri">
                    <article class="revamp-card">
                        <div class="thumb" style="background-image:url('https://images.unsplash.com/photo-1518779578993-ec3579fee39f?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=2c4ff8f1b9f8d2b3a4b5a3c2d6f9e8a1');"></div>
                        <div class="body">
                            <h5>Dasar-dasar Komputer</h5>
                            <p>Pelajari konsep dasar perangkat keras dan perangkat lunak komputer.</p>
                            <a class="btn btn-sm btn-outline-light" href="#">Lihat Materi</a>
                        </div>
                    </article>

                    <article class="revamp-card">
                        <div class="thumb" style="background-image:url('https://images.unsplash.com/photo-1581093588401-24c3d5d5f0b1?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=b3c7b4b4e5f9b9c0a1d0f1a2b3c4d5e6');"></div>
                        <div class="body">
                            <h5>Jaringan Komputer</h5>
                            <p>Memahami cara kerja jaringan komputer dan internet.</p>
                            <a class="btn btn-sm btn-outline-light" href="#">Lihat Materi</a>
                        </div>
                    </article>

                    <article class="revamp-card">
                        <div class="thumb" style="background-image:url('https://images.unsplash.com/photo-1587620931272-2f7f0d7d3f9b?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=9e6a3a2b4c5d6e7f8a9b0c1d2e3f4a5b');"></div>
                        <div class="body">
                            <h5>Pemrograman Dasar</h5>
                            <p>Belajar dasar-dasar logika pemrograman dengan contoh praktis.</p>
                            <a class="btn btn-sm btn-outline-light" href="#">Lihat Materi</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- Right column: ringkasan Tugas & Profil -->
        <div class="col-lg-4">
            <div class="glass-panel mb-3">
                <h6 class="mb-2">Tugas Terbaru</h6>
                <ul class="list-unstyled mb-0">
                    <li class="py-2 border-bottom" style="border-color: rgba(255,255,255,0.03);">
                        <strong>Praktikum Jaringan</strong>
                        <div class="muted small">Deadline: 2025-09-12</div>
                    </li>
                    <li class="py-2 border-bottom" style="border-color: rgba(255,255,255,0.03);">
                        <strong>Latihan Pemrograman</strong>
                        <div class="muted small">Deadline: 2025-09-18</div>
                    </li>
                    <li class="py-2">
                        <strong>Quiz Dasar Komputer</strong>
                        <div class="muted small">Deadline: 2025-09-20</div>
                    </li>
                </ul>
            </div>

            <div class="glass-panel">
                <h6 class="mb-2">Profil Singkat</h6>
                <p class="muted small mb-2">Akses cepat ke profil, pengaturan, dan riwayat belajar Anda.</p>
                <a class="btn btn-sm btn-accent w-100" href="#">Lihat Profil</a>
            </div>
        </div>
    </div>
</div>

<!-- Floating theme toggle -->
<button id="themeToggle" title="Toggle theme">🌙</button>

<!-- Script: gentle DOM swap (replaces original hero and materi sections if present), plus toggle -->
<script>
    (function(){
        // Small helper to replace original .hero and original Materi container if present
        function replaceIf(selector, newNodeHTML) {
            const el = document.querySelector(selector);
            if (el) {
                el.outerHTML = newNodeHTML;
            }
        }

        document.addEventListener('DOMContentLoaded', function(){
            // If original hero exists, replace it with our revamp hero markup (keeps same text)
            const newHero = document.querySelector('.revamp-hero');
            if (newHero && document.querySelector('.hero')) {
                // replace original with our already-rendered revamp-hero (moves it up)
                const existingHero = document.querySelector('.hero');
                existingHero.outerHTML = newHero.outerHTML;
                // remove the duplicate now that it has been moved into original's place
                newHero.remove();
            }

            // If original Materi block exists (by heading text), replace with our revampMateri block
            const originalMateriHeading = Array.from(document.querySelectorAll('h2')).find(h => /Materi Terkini/i.test(h.textContent || ''));
            const revampBlock = document.getElementById('revampMateri');
            if (originalMateriHeading && revampBlock) {
                const originalContainer = originalMateriHeading.closest('.container');
                if (originalContainer) {
                    originalContainer.outerHTML = '<div class="container my-5">' + originalMateriHeading.outerHTML + revampBlock.parentElement.outerHTML + '</div>';
                }
            }

            // Theme toggle: switches icons and toggles a subtle light/dark inversion (kept dark by default)
            const btn = document.getElementById('themeToggle');
            let dark = true;
            btn.addEventListener('click', function(){
                dark = !dark;
                if (!dark) {
                    document.body.style.background = '#f5f7fb';
                    document.body.style.color = '#0b1220';
                    btn.textContent = '☀️';
                } else {
                    document.body.style.background = '';
                    document.body.style.color = '';
                    btn.textContent = '🌙';
                }
            });

            // Subtle reveal animation
            document.querySelectorAll('.revamp-card, .revamp-hero, .glass-panel').forEach((el,i)=>{
                el.style.opacity = 0;
                el.style.transform = 'translateY(10px)';
                setTimeout(()=> {
                    el.style.transition = 'opacity .45s ease, transform .45s cubic-bezier(.2,.9,.3,1)';
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }, 80*i);
            });
        });
    })();
</script>
  <!-- Footer -->
  <footer class="bg-primary text-white text-center p-3 mt-5">
    <p class="mb-0">© 2025 Media Pembelajaran | Dibuat dengan ❤️ menggunakan Bootstrap</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>