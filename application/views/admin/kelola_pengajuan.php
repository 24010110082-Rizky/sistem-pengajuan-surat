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

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .search-box {
            border: 1.5px solid #dce3f5;
            border-radius: 10px;
            padding: 8px 15px;
            font-size: 13px;
            width: 250px;
        }

        .search-box:focus {
            border-color: #2a5298;
            outline: none;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        .form-control,
        .form-select {
            border: 1.5px solid #dce3f5;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
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
            <a href="<?= site_url('dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="<?= site_url('admin/pengajuan') ?>">
                <i class="bi bi-file-earmark-text"></i> Kelola Pengajuan
                <?php
                $CI = &get_instance();
                $CI->load->model('Pengajuan_model');
                $menunggu = $CI->Pengajuan_model->count_by_status('menunggu');
                if ($menunggu > 0):
                ?>
                    <span style="background:#dc3545;color:white;border-radius:50%;width:20px;height:20px;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;margin-left:auto;"><?= $menunggu ?></span>
                <?php endif; ?>
            </a>
            <div class="menu-label">Master Data</div>
            <a href="<?= site_url('admin/jenis-surat') ?>"><i class="bi bi-tags"></i> Jenis Surat</a>
            <a href="<?= site_url('admin/mahasiswa') ?>"><i class="bi bi-people"></i> Data Mahasiswa</a>
            <div class="menu-label">Akun</div>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h5><i class="bi bi-file-earmark-text me-2"></i><?= $title ?></h5>
            <input type="text" id="searchInput" class="search-box" placeholder="Cari nama / jenis surat...">
        </div>

        <div class="card">
            <div class="card-header"><i class="bi bi-list-ul me-2"></i>Daftar Semua Pengajuan</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="tablePengajuan">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Jenis Surat</th>
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pengajuan)): $no = 1;
                                foreach ($pengajuan as $p): ?>
                                    <tr>
                                        <td class="ps-4"><?= $no++ ?></td>
                                        <td><strong><?= $p->nama_mahasiswa ?></strong></td>
                                        <td><?= $p->nim ?></td>
                                        <td><?= $p->nama_surat ?></td>
                                        <td><?= $p->keperluan ?></td>
                                        <td><?= date('d M Y', strtotime($p->tanggal_ajuan)) ?></td>
                                        <td>
                                            <span class="badge-<?= $p->status ?>">
                                                <?php $label = ['menunggu' => 'Menunggu', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'];
                                                echo $label[$p->status] ?? ucfirst($p->status); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" style="border-radius:8px;font-size:12px;"
                                                data-bs-toggle="modal" data-bs-target="#modalUpdate"
                                                data-id="<?= $p->id ?>"
                                                data-nama="<?= $p->nama_mahasiswa ?>"
                                                data-surat="<?= $p->nama_surat ?>"
                                                data-status="<?= $p->status ?>"
                                                data-catatan="<?= $p->catatan_admin ?>">
                                                <i class="bi bi-pencil"></i> Update
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">Belum ada pengajuan masuk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpdate" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-pencil me-2"></i>Update Status Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <?= form_open('', ['id' => 'formUpdate']) ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mahasiswa</label>
                        <p id="modalNama" class="mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Jenis Surat</label>
                        <p id="modalSurat" class="mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="menunggu">Menunggu</option>
                            <option value="diproses">Diproses</option>
                            <option value="selesai">Selesai</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Catatan Admin</label>
                        <textarea name="catatan_admin" class="form-control" rows="3" id="modalCatatan" placeholder="Tambahkan catatan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('modalUpdate').addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget;
            document.getElementById('modalNama').textContent = btn.dataset.nama;
            document.getElementById('modalSurat').textContent = btn.dataset.surat;
            document.getElementById('modalCatatan').value = btn.dataset.catatan;
            document.querySelector('#modalUpdate select[name=status]').value = btn.dataset.status;
            document.getElementById('formUpdate').action = '<?= site_url('admin/pengajuan/update/') ?>' + btn.dataset.id;
        });

        document.getElementById('searchInput').addEventListener('keyup', function() {
            const keyword = this.value.toLowerCase();
            document.querySelectorAll('#tablePengajuan tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
        });

        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('success') ?>',
                confirmButtonColor: '#1e3c72',
                confirmButtonText: 'OK',
                borderRadius: '15px'
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