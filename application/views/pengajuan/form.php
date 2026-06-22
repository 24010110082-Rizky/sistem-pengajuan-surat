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

        .form-control,
        .form-select {
            border: 1.5px solid #dce3f5;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
        }

        .btn-secondary {
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
            <a href="<?= site_url('pengajuan/buat') ?>" class="active"><i class="bi bi-plus-circle"></i> Ajukan Surat</a>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">

        <div class="topbar">
            <h5><i class="bi bi-plus-circle me-2"></i><?= $title ?></h5>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($this->session->userdata('name'), 0, 1)) ?></div>
                <div>
                    <div style="font-size:14px;font-weight:600;"><?= $this->session->userdata('name') ?></div>
                    <div style="font-size:12px;color:#888;"><?= $this->session->userdata('nim') ?></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="bi bi-file-earmark-plus me-2"></i>Form Pengajuan Surat Baru
            </div>
            <div class="card-body p-4">
                <?= form_open('pengajuan/simpan') ?>

                <div class="mb-4">
                    <label class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                    <select name="jenis_surat_id" class="form-select" required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        <?php foreach ($jenis_surat as $js): ?>
                            <option value="<?= $js->id ?>" <?= set_select('jenis_surat_id', $js->id) ?>>
                                <?= $js->nama_surat ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Keperluan / Tujuan Surat <span class="text-danger">*</span></label>
                    <textarea name="keperluan" class="form-control" rows="5"
                        placeholder="Jelaskan keperluan atau tujuan pengajuan surat ini secara lengkap..."
                        required><?= set_value('keperluan') ?></textarea>
                    <div class="form-text">Minimal 10 karakter. Jelaskan secara detail keperluan surat.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send me-2"></i>Kirim Pengajuan
                    </button>
                    <a href="<?= site_url('pengajuan') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Batal
                    </a>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= $this->session->flashdata('error') ?>',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>
</body>

</html>