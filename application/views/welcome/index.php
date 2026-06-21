<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTD-8">
    <meta name="vieport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f4ff;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            color: #1e3c72 !important;
            font-size: 18px;
        }

        .btn-login-nav {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white !important;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-login-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
        }

        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            align-items: center;
            padding-top: 80px;
        }

        .hero h1 {
            font-size: 46px;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #f4c430;
        }

        .hero p {
            font-size: 17px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 35px;
            line-height: 1.7;
        }

        .btn-hero-primary {
            background: white;
            color: #1e3c72;
            border-radius: 12px;
            padding: 13px 32px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            color: #1e3c72;
        }

        .features {
            padding: 80px 0;
            background: white;
        }

        .features h2 {
            font-size: 32px;
            font-weight: 700;
            color: #1e3c72;
            text-align: center;
            margin-bottom: 8px;
        }

        .features .subtitle {
            text-align: center;
            color: #888;
            font-size: 15px;
            margin-bottom: 50px;
        }

        .feature-card {
            background: #f8f9ff;
            border-radius: 18px;
            padding: 30px 22px;
            text-align: center;
            transition: all 0.3s;
            height: 100%;
            border: 1px solid #e8eeff;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 35px rgba(30, 60, 114, 0.1);
            background: white;
        }

        .feature-icon {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
        }

        .feature-icon i {
            font-size: 28px;
            color: white;
        }

        .feature-card h5 {
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .feature-card p {
            color: #888;
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }

        footer {
            background: #1a1a2e;
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            padding: 22px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-envelope-paper-fill me-2" style="color:#2a5298;"></i>Surat Mahasiswa
            </a>
            <a href="<?= site_url('login') ?>" class="btn-login-nav">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h1>Sistem Pengajuan <span>Surat Mahasiswa</span></h1>
                    <p>Ajukan permohonan surat secara online, pantau statusnya, dan dapatkan konfirmasi dari admin kampus dengan mudah dan cepat.</p>
                    <a href="<?= site_url('login') ?>" class="btn-hero-primary">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Sistem
                    </a>
                </div>
                <div class="col-lg-6">
                    <div style="background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.2);border-radius:20px;padding:35px;color:white;">
                        <div class="row g-0 text-center mb-4">
                            <div class="col-4">
                                <h3 style="font-size:32px;font-weight:800;color:#f4c430;margin:0;">5+</h3>
                                <p style="font-size:12px;opacity:0.8;margin:0;">Jenis Surat</p>
                            </div>
                            <div class="col-4">
                                <h3 style="font-size:32px;font-weight:800;color:#f4c430;margin:0;">24/7</h3>
                                <p style="font-size:12px;opacity:0.8;margin:0;">Bisa Diakses</p>
                            </div>
                            <div class="col-4">
                                <h3 style="font-size:32px;font-weight:800;color:#f4c430;margin:0;">100%</h3>
                                <p style="font-size:12px;opacity:0.8;margin:0;">Online</p>
                            </div>
                        </div>
                        <hr style="border-color:rgba(255,255,255,0.2);">
                        <div class="d-flex flex-column gap-3 mt-3">
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:20px;"></i>
                                <p style="margin:0;font-size:14px;">Pengajuan surat secara online</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:20px;"></i>
                                <p style="margin:0;font-size:14px;">Pantau status pengajuan real-time</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:20px;"></i>
                                <p style="margin:0;font-size:14px;">Riwayat pengajuan tersimpan rapi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Fitur Unggulan</h2>
            <p class="subtitle">Semua yang kamu butuhkan dalam satu sistem</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-file-earmark-plus"></i></div>
                        <h5>Pengajuan Online</h5>
                        <p>Ajukan surat kapan saja tanpa harus datang langsung ke kampus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-eye"></i></div>
                        <h5>Pantau Status</h5>
                        <p>Lihat status pengajuan secara real-time dari menunggu hingga selesai.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-speedometer2"></i></div>
                        <h5>Dashboard Admin</h5>
                        <p>Admin dapat mengelola semua pengajuan dengan mudah dan efisien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Sistem Pengajuan Surat Mahasiswa - Universitas Bumigora</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>