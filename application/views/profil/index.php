<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f4ff;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand h5 {
            color: white;
            font-weight: 700;
            font-size: 15px;
            margin: 0;
        }

        .sidebar-brand p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
            margin: 0;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
            gap: 10px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left: 3px solid white;
        }

        .sidebar-menu a i {
            font-size: 18px;
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border-radius: 15px;
            padding: 15px 25px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .topbar h5 {
            margin: 0;
            font-weight: 600;
            color: #1e3c72;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 18px 25px;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }

        .form-control {
            border: 1.5px solid #dce3f5;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        .form-control:disabled {
            background: #f8f9fa;
            color: #888;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        /* Avatar besar di profil */
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 40px;
            margin: 0 auto 15px;
            box-shadow: 0 5px 20px rgba(30, 60, 114, 0.3);
        }

        .profile-info {
            text-align: center;
            padding: 25px;
            border-bottom: 1px solid #f0f4ff;
        }

        .profile-info h5 {
            font-weight: 700;
            color: #1e3c72;
            margin: 0;
        }

        .profile-info p {
            color: #888;
            font-size: 13px;
            margin: 5px 0 0;
        }

        .profile-badge {
            background: #f0f4ff;
            color: #1e3c72;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    
    <div class="sidebar">
        <div class="sidebar-brand">
            <h5><i class="bi bi-envelope-paper-fill me-2"></i>Surat Mahasiswa</h5>
            <p>Universitas Bumigora</p>
        </div>
        <div class="sidebar-menu">
            <a href="<?= site_url('pengajuan') ?>"><i class="bi bi-clock-history"></i> Riwayat Pengajuan</a>
            <a href="<?= site_url('pengajuan/buat') ?>"><i class="bi bi-plus-circle"></i> Ajukan Surat</a>
            <a href="<?= site_url('profil') ?>" class="active"><i class="bi bi-person-circle"></i> Profil Saya</a>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">

        <div class="topbar">
            <h5><i class="bi bi-person-circle me-2"></i><?= $title ?></h5>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($this->session->userdata('name'), 0, 1)) ?></div>
                <div>
                    <div style="font-size:14px;font-weight:600;"><?= $this->session->userdata('name') ?></div>
                    <div style="font-size:12px;color:#888;"><?= $this->session->userdata('nim') ?></div>
                </div>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="profile-info">
                            <div class="profile-avatar">
                                <?= strtoupper(substr($user->name, 0, 1)) ?>
                            </div>
                            <h5><?= $user->name ?></h5>
                            <p><?= $user->email ?? 'Email belum diisi' ?></p>
                            <span class="profile-badge"><i class="bi bi-mortarboard me-1"></i>Mahasiswa</span>
                        </div>
                        <div class="p-4">
                            <div class="mb-3">
                                <small class="text-muted">NIM</small>
                                <p class="mb-0 fw-bold"><?= $user->nim ?></p>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">Username</small>
                                <p class="mb-0 fw-bold"><?= $user->username ?></p>
                            </div>
                            <div class="mb-0">
                                <small class="text-muted">Status Akun</small>
                                <p class="mb-0">
                                    <span style="background:#d1e7dd;color:#0a3622;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;">
                                        ✅ <?= ucfirst($user->status) ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-pencil-square me-2"></i>Edit Profil
                    </div>
                    <div class="card-body p-4">
                        <?= form_open('profil/update') ?>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"
                                    value="<?= $user->name ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" value="<?= $user->nim ?>" disabled>
                                <div class="form-text">NIM tidak dapat diubah.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?= $user->username ?>" disabled>
                                <div class="form-text">Username tidak dapat diubah.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= $user->email ?>" placeholder="Email kamu">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengubah password">
                            <div class="form-text">Minimal 6 karakter.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-2"></i>Simpan Perubahan
                        </button>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>