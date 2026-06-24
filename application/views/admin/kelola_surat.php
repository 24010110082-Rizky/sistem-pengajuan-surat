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
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .btn-tambah {
            background: white;
            color: #1e3c72;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-tambah:hover {
            background: #f0f4ff;
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

        .badge-aktif {
            background: #d1e7dd;
            color: #0a3622;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-nonaktif {
            background: #f8d7da;
            color: #842029;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
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
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <h5><i class="bi bi-envelope-paper-fill me-2"></i>Surat Mahasiswa</h5>
            <p>Panel Admin - Universitas Bumigora</p>
        </div>
        <div class="sidebar-menu">
            <div class="menu-label">Menu Utama</div>
            <a href="<?= site_url('dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="<?= site_url('admin/pengajuan') ?>"><i class="bi bi-file-earmark-text"></i> Kelola Pengajuan</a>
            <div class="menu-label">Master Data</div>
            <a href="<?= site_url('admin/jenis-surat') ?>" class="active"><i class="bi bi-tags"></i> Jenis Surat</a>
            <a href="<?= site_url('admin/mahasiswa') ?>"><i class="bi bi-people"></i> Data Mahasiswa</a>
            <div class="menu-label">Akun</div>
            <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>
