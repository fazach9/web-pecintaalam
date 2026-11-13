
<?php
$baseUrl = '/arga_dahana_starter/public';
$logo = $baseUrl . '/assets/img/logo.png';
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAPALA Arga Dahana | Universitas Muria Kudus</title>

    <meta name="description" content="Website resmi MAPALA Arga Dahana Universitas Muria Kudus. Menjelajah alam, membangun persaudaraan, dan menjaga lingkungan.">

    <meta name="theme-color" content="#183d2b">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/app.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark forest-nav sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $baseUrl ?>/">
            <img src="<?= $logo ?>" alt="Logo MAPALA Arga Dahana" class="brand-logo">

            <span class="brand-name">
                ARGA DAHANA
                <small>UNIVERSITAS MURIA KUDUS</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kegiatan">Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nilai">Nilai Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#galeri">Galeri</a>
                </li>

                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-login" href="<?= $baseUrl ?>/login">
                        <i class="bi bi-person-circle me-1"></i>
                        Login Anggota
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- HERO -->
<header class="hero-section" id="beranda">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-9">

                <span class="hero-label">
                    MAHASISWA PECINTA ALAM
                    <span class="label-dot"></span>
                    UNIVERSITAS MURIA KUDUS
                </span>

                <h1>
                    Menjelajah Alam,
                    <span>Menjaga Kehidupan.</span>
                </h1>

                <p class="hero-description">
                    Bersama alam kita belajar, bersama persaudaraan
                    kita tumbuh, dan melalui aksi nyata kita menjaga
                    bumi untuk generasi mendatang.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#tentang" class="btn btn-nature btn-lg">
                        Kenali Kami
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="#kegiatan" class="btn btn-outline-light btn-lg">
                        Jelajahi Kegiatan
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="hero-bottom">
        <div class="container">
            <span>
                <i class="bi bi-compass me-2"></i>
                EXPLORE · LEARN · CONSERVE
            </span>
        </div>
    </div>
</header>


<main>

    <!-- TENTANG -->
    <section class="about-section section-space" id="tentang">
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="about-image">
                        <img
                            src="https://images.unsplash.com/photo-1472396961693-142e6e269027?auto=format&fit=crop&w=1000&q=85"
                            alt="Pemandangan alam dan hutan"
                            loading="lazy">

                        <div class="image-caption">
                            <i class="bi bi-tree-fill me-2"></i>
                            Bersahabat dengan alam
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <span class="section-label">TENTANG KAMI</span>

                    <h2 class="section-heading">
                        Bertumbuh Bersama Alam,
                        Bergerak Bersama Persaudaraan.
                    </h2>

                    <p class="section-description">
                        MAPALA Arga Dahana merupakan organisasi
                        mahasiswa pecinta alam di lingkungan
                        Universitas Muria Kudus.
                    </p>

                    <p class="section-description">
                        Organisasi ini menjadi ruang untuk belajar,
                        mengembangkan kemampuan, membangun
                        solidaritas, serta menumbuhkan kepedulian
                        terhadap kelestarian lingkungan.
                    </p>

                    <a href="#nilai" class="text-link">
                        Kenali nilai organisasi
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </section>


    <!-- NILAI ORGANISASI -->
    <section class="values-section section-space" id="nilai">
        <div class="container">

            <div class="section-heading-wrap text-center">
                <span class="section-label">NILAI KAMI</span>
                <h2 class="section-heading">Lebih dari Sekadar Petualangan</h2>
                <p class="section-description mx-auto">
                    Alam menjadi ruang belajar untuk membangun
                    karakter, kepedulian, dan tanggung jawab.
                </p>
            </div>

            <div class="row g-4 mt-3">

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-mountain"></i>
                        </div>
                        <h3>Petualangan</h3>
                        <p>
                            Mengembangkan keberanian, keterampilan,
                            dan kemampuan menghadapi tantangan alam.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>Persaudaraan</h3>
                        <p>
                            Membangun kebersamaan, solidaritas,
                            dan rasa saling menghargai.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-tree"></i>
                        </div>
                        <h3>Konservasi</h3>
                        <p>
                            Menumbuhkan kepedulian dan tanggung
                            jawab terhadap kelestarian lingkungan.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3>Pembelajaran</h3>
                        <p>
                            Mengembangkan pengetahuan, pengalaman,
                            dan karakter melalui kegiatan nyata.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- KEGIATAN -->
    <section class="activities-section section-space" id="kegiatan">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-between
                        align-items-end gap-3 mb-4">

                <div>
                    <span class="section-label">RUANG GERAK KAMI</span>
                    <h2 class="section-heading mb-0">
                        Kegiatan dan Petualangan
                    </h2>
                </div>

                <span class="text-muted small">
                    Program ilustratif — sesuaikan dengan kegiatan resmi organisasi.
                </span>

            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=900&q=85"
                            alt="Pendakian gunung"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">PETUALANGAN</span>
                            <h3>Pendakian dan Ekspedisi</h3>
                            <p>
                                Kegiatan penjelajahan alam untuk
                                membangun keterampilan dan pengalaman.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=900&q=85"
                            alt="Hutan dan konservasi"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">LINGKUNGAN</span>
                            <h3>Konservasi Alam</h3>
                            <p>
                                Aksi kepedulian terhadap lingkungan
                                dan pelestarian alam.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=85"
                            alt="Kebersamaan kelompok"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">PENDIDIKAN</span>
                            <h3>Pendidikan dan Pelatihan</h3>
                            <p>
                                Pengembangan pengetahuan, keterampilan,
                                dan karakter anggota.
                            </p>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>


    <!-- QUOTE -->
    <section class="quote-section">
        <div class="container text-center">
            <i class="bi bi-quote quote-icon"></i>

            <h2>
                Alam bukan warisan dari nenek moyang,
                melainkan titipan untuk generasi mendatang.
            </h2>

            <span>ARGA DAHANA</span>
        </div>
    </section>


    <!-- GALERI -->
    <section class="gallery-section section-space" id="galeri">
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-label">CERITA PERJALANAN</span>
                <h2 class="section-heading">Galeri Alam dan Petualangan</h2>
                <p class="section-description">
                    Dokumentasi visual perjalanan dan aktivitas
                    organisasi.
                </p>
            </div>

            <div class="gallery-grid">

                <div class="gallery-item gallery-large">
                    <img
                        src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1000&q=85"
                        alt="Pegunungan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1472396961693-142e6e269027?auto=format&fit=crop&w=700&q=85"
                        alt="Hutan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=85"
                        alt="Pemandangan alam"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=700&q=85"
                        alt="Pepohonan hutan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=700&q=85"
                        alt="Pemandangan pegunungan"
                        loading="lazy">
                </div>

            </div>

            <p class="gallery-note text-center mt-4">
                Foto di atas merupakan gambar ilustrasi.
                Ganti dengan dokumentasi resmi Arga Dahana.
            </p>

        </div>
    </section>


    <!-- CTA -->
    <section class="join-section">
        <div class="container text-center">

            <span class="section-label text-light">
                JELAJAHI POTENSI DIRI
            </span>

            <h2>
                Setiap Perjalanan Memiliki Cerita.
                <br>
                Mari Tumbuh Bersama.
            </h2>

            <p>
                Temukan ruang untuk belajar, berkarya,
                dan membangun kepedulian terhadap alam.
            </p>

            <a href="#kontak" class="btn btn-light btn-lg px-4">
                Hubungi Kami
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </section>


    <!-- KONTAK -->
    <section class="contact-section section-space" id="kontak">
        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6">
                    <span class="section-label">TERHUBUNG DENGAN KAMI</span>

                    <h2 class="section-heading">
                        Mari Terhubung.
                    </h2>

                    <p class="section-description">
                        Untuk informasi organisasi, kegiatan,
                        dan komunikasi resmi, silakan hubungi
                        pengurus MAPALA Arga Dahana.
                    </p>
                </div>

                <div class="col-lg-6">

                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <strong>Lokasi Organisasi</strong>
                            <p>Universitas Muria Kudus</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <p>Tambahkan email resmi organisasi</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="bi bi-instagram"></i>
                        <div>
                            <strong>Instagram</strong>
                            <p>Tambahkan akun Instagram resmi</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>


<!-- FOOTER -->
<footer class="forest-footer">

    <div class="container">

        <div class="row g-4 py-5">

            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-3">

                    <img src="<?= $logo ?>"
                         alt="Logo Arga Dahana"
                         class="footer-logo">

                    <div>
                        <h5 class="mb-1">MAPALA ARGA DAHANA</h5>
                        <small>Universitas Muria Kudus</small>
                    </div>

                </div>

                <p class="footer-description">
                    Menjelajah alam, membangun persaudaraan,
                    dan menjaga kehidupan.
                </p>
            </div>

            <div class="col-lg-3">
                <h6>NAVIGASI</h6>
                <ul class="footer-links">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#kegiatan">Kegiatan</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6>AKSES</h6>
                <ul class="footer-links">
                    <li><a href="<?= $baseUrl ?>/login">Login Anggota</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>
                &copy; <?= date('Y') ?> MAPALA Arga Dahana.
                Universitas Muria Kudus.
            </p>
        </div>

    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
$baseUrl = '/arga_dahana_starter/public';
$logo = $baseUrl . '/assets/img/logo.png';
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MAPALA Arga Dahana | Universitas Muria Kudus</title>

    <meta name="description" content="Website resmi MAPALA Arga Dahana Universitas Muria Kudus. Menjelajah alam, membangun persaudaraan, dan menjaga lingkungan.">

    <meta name="theme-color" content="#183d2b">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/app.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark forest-nav sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= $baseUrl ?>/">
            <img src="<?= $logo ?>" alt="Logo MAPALA Arga Dahana" class="brand-logo">

            <span class="brand-name">
                ARGA DAHANA
                <small>UNIVERSITAS MURIA KUDUS</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kegiatan">Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nilai">Nilai Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#galeri">Galeri</a>
                </li>

                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-login" href="<?= $baseUrl ?>/login">
                        <i class="bi bi-person-circle me-1"></i>
                        Login Anggota
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- HERO -->
<header class="hero-section" id="beranda">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-9">

                <span class="hero-label">
                    MAHASISWA PECINTA ALAM
                    <span class="label-dot"></span>
                    UNIVERSITAS MURIA KUDUS
                </span>

                <h1>
                    Menjelajah Alam,
                    <span>Menjaga Kehidupan.</span>
                </h1>

                <p class="hero-description">
                    Bersama alam kita belajar, bersama persaudaraan
                    kita tumbuh, dan melalui aksi nyata kita menjaga
                    bumi untuk generasi mendatang.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#tentang" class="btn btn-nature btn-lg">
                        Kenali Kami
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="#kegiatan" class="btn btn-outline-light btn-lg">
                        Jelajahi Kegiatan
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="hero-bottom">
        <div class="container">
            <span>
                <i class="bi bi-compass me-2"></i>
                EXPLORE · LEARN · CONSERVE
            </span>
        </div>
    </div>
</header>


<main>

    <!-- TENTANG -->
    <section class="about-section section-space" id="tentang">
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="about-image">
                        <img
                            src="https://images.unsplash.com/photo-1472396961693-142e6e269027?auto=format&fit=crop&w=1000&q=85"
                            alt="Pemandangan alam dan hutan"
                            loading="lazy">

                        <div class="image-caption">
                            <i class="bi bi-tree-fill me-2"></i>
                            Bersahabat dengan alam
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <span class="section-label">TENTANG KAMI</span>

                    <h2 class="section-heading">
                        Bertumbuh Bersama Alam,
                        Bergerak Bersama Persaudaraan.
                    </h2>

                    <p class="section-description">
                        MAPALA Arga Dahana merupakan organisasi
                        mahasiswa pecinta alam di lingkungan
                        Universitas Muria Kudus.
                    </p>

                    <p class="section-description">
                        Organisasi ini menjadi ruang untuk belajar,
                        mengembangkan kemampuan, membangun
                        solidaritas, serta menumbuhkan kepedulian
                        terhadap kelestarian lingkungan.
                    </p>

                    <a href="#nilai" class="text-link">
                        Kenali nilai organisasi
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </section>


    <!-- NILAI ORGANISASI -->
    <section class="values-section section-space" id="nilai">
        <div class="container">

            <div class="section-heading-wrap text-center">
                <span class="section-label">NILAI KAMI</span>
                <h2 class="section-heading">Lebih dari Sekadar Petualangan</h2>
                <p class="section-description mx-auto">
                    Alam menjadi ruang belajar untuk membangun
                    karakter, kepedulian, dan tanggung jawab.
                </p>
            </div>

            <div class="row g-4 mt-3">

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-mountain"></i>
                        </div>
                        <h3>Petualangan</h3>
                        <p>
                            Mengembangkan keberanian, keterampilan,
                            dan kemampuan menghadapi tantangan alam.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>Persaudaraan</h3>
                        <p>
                            Membangun kebersamaan, solidaritas,
                            dan rasa saling menghargai.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-tree"></i>
                        </div>
                        <h3>Konservasi</h3>
                        <p>
                            Menumbuhkan kepedulian dan tanggung
                            jawab terhadap kelestarian lingkungan.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3>Pembelajaran</h3>
                        <p>
                            Mengembangkan pengetahuan, pengalaman,
                            dan karakter melalui kegiatan nyata.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- KEGIATAN -->
    <section class="activities-section section-space" id="kegiatan">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-between
                        align-items-end gap-3 mb-4">

                <div>
                    <span class="section-label">RUANG GERAK KAMI</span>
                    <h2 class="section-heading mb-0">
                        Kegiatan dan Petualangan
                    </h2>
                </div>

                <span class="text-muted small">
                    Program ilustratif — sesuaikan dengan kegiatan resmi organisasi.
                </span>

            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=900&q=85"
                            alt="Pendakian gunung"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">PETUALANGAN</span>
                            <h3>Pendakian dan Ekspedisi</h3>
                            <p>
                                Kegiatan penjelajahan alam untuk
                                membangun keterampilan dan pengalaman.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=900&q=85"
                            alt="Hutan dan konservasi"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">LINGKUNGAN</span>
                            <h3>Konservasi Alam</h3>
                            <p>
                                Aksi kepedulian terhadap lingkungan
                                dan pelestarian alam.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="activity-card">
                        <img
                            src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=85"
                            alt="Kebersamaan kelompok"
                            loading="lazy">

                        <div class="activity-content">
                            <span class="activity-category">PENDIDIKAN</span>
                            <h3>Pendidikan dan Pelatihan</h3>
                            <p>
                                Pengembangan pengetahuan, keterampilan,
                                dan karakter anggota.
                            </p>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>


    <!-- QUOTE -->
    <section class="quote-section">
        <div class="container text-center">
            <i class="bi bi-quote quote-icon"></i>

            <h2>
                Alam bukan warisan dari nenek moyang,
                melainkan titipan untuk generasi mendatang.
            </h2>

            <span>ARGA DAHANA</span>
        </div>
    </section>


    <!-- GALERI -->
    <section class="gallery-section section-space" id="galeri">
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-label">CERITA PERJALANAN</span>
                <h2 class="section-heading">Galeri Alam dan Petualangan</h2>
                <p class="section-description">
                    Dokumentasi visual perjalanan dan aktivitas
                    organisasi.
                </p>
            </div>

            <div class="gallery-grid">

                <div class="gallery-item gallery-large">
                    <img
                        src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1000&q=85"
                        alt="Pegunungan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1472396961693-142e6e269027?auto=format&fit=crop&w=700&q=85"
                        alt="Hutan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=85"
                        alt="Pemandangan alam"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=700&q=85"
                        alt="Pepohonan hutan"
                        loading="lazy">
                </div>

                <div class="gallery-item">
                    <img
                        src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=700&q=85"
                        alt="Pemandangan pegunungan"
                        loading="lazy">
                </div>

            </div>

            <p class="gallery-note text-center mt-4">
                Foto di atas merupakan gambar ilustrasi.
                Ganti dengan dokumentasi resmi Arga Dahana.
            </p>

        </div>
    </section>


    <!-- CTA -->
    <section class="join-section">
        <div class="container text-center">

            <span class="section-label text-light">
                JELAJAHI POTENSI DIRI
            </span>

            <h2>
                Setiap Perjalanan Memiliki Cerita.
                <br>
                Mari Tumbuh Bersama.
            </h2>

            <p>
                Temukan ruang untuk belajar, berkarya,
                dan membangun kepedulian terhadap alam.
            </p>

            <a href="#kontak" class="btn btn-light btn-lg px-4">
                Hubungi Kami
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </section>


    <!-- KONTAK -->
    <section class="contact-section section-space" id="kontak">
        <div class="container">

            <div class="row g-5">

                <div class="col-lg-6">
                    <span class="section-label">TERHUBUNG DENGAN KAMI</span>

                    <h2 class="section-heading">
                        Mari Terhubung.
                    </h2>

                    <p class="section-description">
                        Untuk informasi organisasi, kegiatan,
                        dan komunikasi resmi, silakan hubungi
                        pengurus MAPALA Arga Dahana.
                    </p>
                </div>

                <div class="col-lg-6">

                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <strong>Lokasi Organisasi</strong>
                            <p>Universitas Muria Kudus</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <p>Tambahkan email resmi organisasi</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="bi bi-instagram"></i>
                        <div>
                            <strong>Instagram</strong>
                            <p>Tambahkan akun Instagram resmi</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>


<!-- FOOTER -->
<footer class="forest-footer">

    <div class="container">

        <div class="row g-4 py-5">

            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-3">

                    <img src="<?= $logo ?>"
                         alt="Logo Arga Dahana"
                         class="footer-logo">

                    <div>
                        <h5 class="mb-1">MAPALA ARGA DAHANA</h5>
                        <small>Universitas Muria Kudus</small>
                    </div>

                </div>

                <p class="footer-description">
                    Menjelajah alam, membangun persaudaraan,
                    dan menjaga kehidupan.
                </p>
            </div>

            <div class="col-lg-3">
                <h6>NAVIGASI</h6>
                <ul class="footer-links">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#kegiatan">Kegiatan</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6>AKSES</h6>
                <ul class="footer-links">
                    <li><a href="<?= $baseUrl ?>/login">Login Anggota</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>
                &copy; <?= date('Y') ?> MAPALA Arga Dahana.
                Universitas Muria Kudus.
            </p>
        </div>

    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
