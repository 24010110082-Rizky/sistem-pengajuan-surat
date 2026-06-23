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

        .sidebar-menu .menu-label {
            padding: 8px 20px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
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

        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 25px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card .stat-icon {
            font-size: 45px;
            opacity: 0.25;
            position: absolute;
            right: 15px;
            top: 15px;
        }

        .stat-card h2 {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        .stat-card p {
            font-size: 13px;
            margin: 5px 0 0;
            opacity: 0.85;
        }

        .bg-total {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .bg-menunggu {
            background: linear-gradient(135deg, #f6a01a, #f4c430);
        }

        .bg-diproses {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
        }

        .bg-selesai {
            background: linear-gradient(135deg, #198754, #40c057);
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

        .table th {
            background: #f0f4ff;
            color: #1e3c72;
            font-weight: 600;
            font-size: 13px;
            border: none;
        }

        .table td {
            font-size: 13px;
            vertical-align: middle;
        }

        .badge-menunggu {
            background: #fff3cd;
            color: #856404;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-diproses {
            background: #cfe2ff;
            color: #084298;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-selesai {
            background: #d1e7dd;
            color: #0a3622;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-ditolak {
            background: #f8d7da;
            color: #842029;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
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

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h5><i class="bi bi-envelope-paper-fill me-2"></i>Surat Mahasiswa</h5>
            <p>Panel Admin - Universitas Bumigora</p>
        </div>
        <div class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="<?= site_url('dashboard') ?>" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="<?= site_url('admin/pengajuan') ?>">
                <i class="bi bi-file-earmark-text"></i> Kelola Pengajuan
                <?php
                $CI = &get_instance();
                $CI->load->model('Pengajuan_model');
                $menunggu_badge = $CI->Pengajuan_model->count_by_status('menunggu');
                if ($menunggu_badge > 0):
                ?>
                    <span style="background:#dc3545;color:white;border-radius:50%;width:20px;height:20px;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;margin-left:auto;"><?= $menunggu_badge ?></span>
                <?php endif; ?>
            </a>
            <div class="menu-label">Master Data</div>
            <a href="<?= site_url('admin/jenis-surat') ?>"><i class="bi bi-tags"></i> Jenis Surat</a>
            <a href="<?= site_url('admin/mahasiswa') ?>"><i class="bi bi-people"></i> Data Mahasiswa</a>
            <div class="menu-label">Akun</div>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Topbar -->
        <div class="topbar">
            <h5><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h5>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($this->session->userdata('name'), 0, 1)) ?></div>
                <div>
                    <div style="font-size:14px;font-weight:600;"><?= $this->session->userdata('name') ?></div>
                    <div style="font-size:12px;color:#888;">Administrator</div>
                </div>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stat-card bg-total">
                    <i class="bi bi-collection stat-icon"></i>
                    <h2><?= $total ?></h2>
                    <p>Total Pengajuan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-menunggu">
                    <i class="bi bi-hourglass-split stat-icon"></i>
                    <h2><?= $menunggu ?></h2>
                    <p>Menunggu Proses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-diproses">
                    <i class="bi bi-arrow-repeat stat-icon"></i>
                    <h2><?= $diproses ?></h2>
                    <p>Sedang Diproses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-selesai">
                    <i class="bi bi-check-circle stat-icon"></i>
                    <h2><?= $selesai ?></h2>
                    <p>Selesai</p>
                </div>
            </div>
        </div>

        <!-- Tabel Pengajuan Terbaru -->
        <div class="card">
            <div class="card-header">
                <i class="bi bi-clock-history me-2"></i>Pengajuan Terbaru
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pengajuan_baru)): $no = 1;
                                foreach ($pengajuan_baru as $p): ?>
                                    <tr>
                                        <td class="ps-4"><?= $no++ ?></td>
                                        <td><strong><?= $p->nama_mahasiswa ?></strong></td>
                                        <td><?= $p->nim ?></td>
                                        <td><?= $p->nama_surat ?></td>
                                        <td><?= date('d M Y', strtotime($p->tanggal_ajuan)) ?></td>
                                        <td>
                                            <span class="badge-<?= $p->status ?>">
                                                <?php $label = ['menunggu' => '⏳ Menunggu', 'diproses' => '🔄 Diproses', 'selesai' => '✅ Selesai', 'ditolak' => '❌ Ditolak'];
                                                echo $label[$p->status] ?? ucfirst($p->status); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('admin/pengajuan') ?>" class="btn btn-sm btn-outline-primary" style="border-radius:8px;font-size:12px;">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada pengajuan masuk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($this->session->flashdata('success')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('success') ?>',
                confirmButtonColor: '#1e3c72',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
</body>

</html>