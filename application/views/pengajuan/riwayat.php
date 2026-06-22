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

        .btn-ajukan {
            background: white;
            color: #1e3c72;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-ajukan:hover {
            background: #f0f4ff;
            color: #1e3c72;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        .empty-state i {
            font-size: 60px;
            margin-bottom: 15px;
            color: #dce3f5;
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

        .search-box {
            border: 1.5px solid #dce3f5;
            border-radius: 10px;
            padding: 8px 15px;
            font-size: 13px;
            width: 200px;
        }

        .search-box:focus {
            border-color: #2a5298;
            outline: none;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        .filter-btn {
            border: 1.5px solid #dce3f5;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 12px;
            font-weight: 600;
            background: white;
            color: #666;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn:hover {
            border-color: #2a5298;
            color: #2a5298;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border-color: transparent;
        }

        .filter-btn.active-menunggu {
            background: #fff3cd;
            color: #856404;
            border-color: #f6c000;
        }

        .filter-btn.active-diproses {
            background: #cfe2ff;
            color: #084298;
            border-color: #0d6efd;
        }

        .filter-btn.active-selesai {
            background: #d1e7dd;
            color: #0a3622;
            border-color: #198754;
        }

        .filter-btn.active-ditolak {
            background: #f8d7da;
            color: #842029;
            border-color: #dc3545;
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
            <a href="<?= site_url('pengajuan') ?>" class="active"><i class="bi bi-clock-history"></i> Riwayat Pengajuan</a>
            <a href="<?= site_url('pengajuan/buat') ?>"><i class="bi bi-plus-circle"></i> Ajukan Surat</a>
            <a href="<?= site_url('profil') ?>"><i class="bi bi-person-circle"></i> Profil Saya</a>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h5><i class="bi bi-clock-history me-2"></i><?= $title ?></h5>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($this->session->userdata('name'), 0, 1)) ?></div>
                <div>
                    <div style="font-size:14px;font-weight:600;"><?= $this->session->userdata('name') ?></div>
                    <div style="font-size:12px;color:#888;"><?= $this->session->userdata('nim') ?></div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div class="d-flex gap-2 flex-wrap">
                <button class="filter-btn active" onclick="filterStatus('semua', this)">Semua</button>
                <button class="filter-btn" onclick="filterStatus('menunggu', this)">Menunggu</button>
                <button class="filter-btn" onclick="filterStatus('diproses', this)">Diproses</button>
                <button class="filter-btn" onclick="filterStatus('selesai', this)">Selesai</button>
                <button class="filter-btn" onclick="filterStatus('ditolak', this)">Ditolak</button>
            </div>
            <input type="text" id="searchInput" class="search-box" placeholder="Cari surat...">
        </div>

        <div class="card">
            <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
                <span><i class="bi bi-list-ul me-2"></i>Riwayat Pengajuan Surat Saya</span>
                <a href="<?= site_url('pengajuan/buat') ?>" class="btn-ajukan">
                    <i class="bi bi-plus me-1"></i>Ajukan Baru
                </a>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($pengajuan)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="tabelRiwayat">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Jenis Surat</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal Ajuan</th>
                                    <th>Status</th>
                                    <th>Catatan Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pengajuan as $p): ?>
                                    <tr data-status="<?= $p->status ?>">
                                        <td class="ps-4"><?= $no++ ?></td>
                                        <td><strong><?= $p->nama_surat ?></strong></td>
                                        <td style="max-width:200px;"><?= strlen($p->keperluan) > 60 ? substr($p->keperluan, 0, 60) . '...' : $p->keperluan ?></td>
                                        <td><?= date('d M Y, H:i', strtotime($p->tanggal_ajuan)) ?></td>
                                        <td>
                                            <span class="badge-<?= $p->status ?>">
                                                <?php $label = ['menunggu' => 'Menunggu', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'];
                                                echo $label[$p->status] ?? ucfirst($p->status); ?>
                                            </span>
                                        </td>
                                        <td style="color:#666;font-size:12px;"><?= $p->catatan_admin ? $p->catatan_admin : '<span style="color:#ccc">-</span>' ?></td>
                                        <td>
                                            <?php if ($p->status === 'menunggu'): ?>
                                                <a href="<?= site_url('pengajuan/edit/' . $p->id) ?>"
                                                    class="btn btn-sm btn-warning me-1"
                                                    style="border-radius:8px;font-size:12px;">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <button class="btn btn-sm btn-danger me-1"
                                                    style="border-radius:8px;font-size:12px;"
                                                    onclick="konfirmasiHapus('<?= site_url('pengajuan/hapus/' . $p->id) ?>')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($p->status === 'selesai'): ?>
                                                <a href="<?= site_url('pengajuan/cetak/' . $p->id) ?>"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-primary"
                                                    style="border-radius:8px;font-size:12px;">
                                                    <i class="bi bi-printer"></i> Cetak
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h6 style="color:#888;">Belum ada pengajuan surat</h6>
                        <p style="font-size:13px;">Klik tombol <strong>Ajukan Baru</strong> untuk membuat pengajuan pertama kamu.</p>
                        <a href="<?= site_url('pengajuan/buat') ?>" class="btn btn-primary btn-sm"><i class="bi bi-plus me-1"></i>Ajukan Sekarang</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function filterStatus(status, btn) {
            document.querySelectorAll('.filter-btn').forEach(b => b.className = 'filter-btn');
            btn.className = status === 'semua' ? 'filter-btn active' : 'filter-btn active-' + status;
            document.querySelectorAll('#tabelRiwayat tbody tr').forEach(row => {
                row.style.display = (status === 'semua' || row.dataset.status === status) ? '' : 'none';
            });
        }
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            document.querySelectorAll('#tabelRiwayat tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
        });

        function konfirmasiHapus(url) {
            Swal.fire({
                title: 'Hapus pengajuan ini?',
                text: 'Data yang sudah dihapus tidak bisa dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('success') ?>',
                confirmButtonColor: '#1e3c72',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
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