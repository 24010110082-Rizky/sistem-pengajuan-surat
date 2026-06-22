<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pengajuan Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f4ff;
        }

        .print-wrapper {
            max-width: 750px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .print-header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 30px 40px;
            text-align: center;
        }

        .print-header h4 {
            font-weight: 700;
            margin: 0;
            font-size: 18px;
        }

        .print-header p {
            margin: 5px 0 0;
            opacity: 0.8;
            font-size: 13px;
        }

        .print-body {
            padding: 35px 40px;
        }

        .print-title {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f4ff;
        }

        .print-title h5 {
            font-weight: 700;
            color: #1e3c72;
            font-size: 16px;
            margin: 0;
        }

        .print-title p {
            color: #888;
            font-size: 13px;
            margin: 5px 0 0;
        }

        .info-row {
            display: flex;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .info-label {
            width: 180px;
            min-width: 180px;
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #1a1a1a;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-selesai {
            background: #d1e7dd;
            color: #0a3622;
        }

        .keperluan-box {
            background: #f8f9ff;
            border: 1px solid #e8eeff;
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
            color: #333;
            margin-top: 5px;
        }

        .catatan-box {
            background: #fff9e6;
            border: 1px solid #ffd966;
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
            color: #333;
            margin-top: 5px;
        }

        .print-footer {
            border-top: 2px solid #f0f4ff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .print-footer p {
            margin: 0;
            font-size: 12px;
            color: #aaa;
        }

        .btn-print {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-print:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
        }

        .btn-back {
            background: #f0f4ff;
            color: #1e3c72;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        @media print {

            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }

            .print-wrapper {
                box-shadow: none !important;
                margin: 0 !important;
                border-radius: 0 !important;
                max-width: 100% !important;
            }

            .print-footer,
            .no-print,
            .btn-print,
            .btn-back {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <?php
    if ($pengajuan->status !== 'selesai'):
    ?>
        <div class="print-wrapper">
            <div class="print-header">
                <h4><i class="bi bi-envelope-paper-fill me-2"></i>Universitas Bumigora</h4>
                <p>Sistem Pengajuan Surat Mahasiswa</p>
            </div>
            <div class="print-body text-center py-5">
                <i class="bi bi-exclamation-circle" style="font-size:60px;color:#f6a01a;"></i>
                <h5 style="color:#1e3c72;font-weight:700;margin-top:20px;">Belum Bisa Dicetak</h5>
                <p style="color:#888;font-size:14px;">
                    Bukti pengajuan hanya dapat dicetak jika status pengajuan sudah <strong>Selesai</strong>.<br>
                    Status pengajuan kamu saat ini:
                    <?php
                    $label = ['menunggu' => 'Menunggu', 'diproses' => 'Diproses', 'ditolak' => 'Ditolak'];
                    echo '<strong>' . $label[$pengajuan->status] . '</strong>';
                    ?>
                </p>
                <a href="<?= site_url('pengajuan') ?>" class="btn-back mt-3" style="display:inline-block;">
                    <i class="bi bi-arrow-left me-1"></i>Kembali ke Riwayat
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="print-wrapper">
            <div class="print-header">
                <h4><i class="bi bi-envelope-paper-fill me-2"></i>Universitas Bumigora</h4>
                <p>Sistem Pengajuan Surat Mahasiswa</p>
            </div>

            <div class="print-body">
                <div class="print-title">
                    <h5>BUKTI PENGAJUAN SURAT</h5>
                    <p>No. Pengajuan: #<?= str_pad($pengajuan->id, 5, '0', STR_PAD_LEFT) ?></p>
                </div>

                <div class="mb-4">
                    <p style="font-weight:700;color:#1e3c72;font-size:14px;margin-bottom:15px;"><i class="bi bi-person me-2"></i>Data Mahasiswa</p>
                    <div class="info-row">
                        <span class="info-label">Nama Mahasiswa</span>
                        <span class="info-value">: <?= $pengajuan->nama_mahasiswa ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">NIM</span>
                        <span class="info-value">: <?= $pengajuan->nim ?></span>
                    </div>
                </div>

                <div class="mb-4">
                    <p style="font-weight:700;color:#1e3c72;font-size:14px;margin-bottom:15px;"><i class="bi bi-file-earmark-text me-2"></i>Detail Pengajuan</p>
                    <div class="info-row">
                        <span class="info-label">Jenis Surat</span>
                        <span class="info-value">: <?= $pengajuan->nama_surat ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Tanggal Ajuan</span>
                        <span class="info-value">: <?= date('d F Y, H:i', strtotime($pengajuan->tanggal_ajuan)) ?> WIB</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Status</span>
                        <span class="info-value">:
                            <span class="status-badge status-selesai">Selesai</span>
                        </span>
                    </div>
                    <?php if ($pengajuan->tgl_selesai): ?>
                        <div class="info-row">
                            <span class="info-label">Tanggal Selesai</span>
                            <span class="info-value">: <?= date('d F Y, H:i', strtotime($pengajuan->tgl_selesai)) ?> WIB</span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <p style="font-weight:700;color:#1e3c72;font-size:14px;margin-bottom:8px;"><i class="bi bi-chat-text me-2"></i>Keperluan / Tujuan</p>
                    <div class="keperluan-box"><?= $pengajuan->keperluan ?></div>
                </div>

                <?php if ($pengajuan->catatan_admin): ?>
                    <div class="mb-4">
                        <p style="font-weight:700;color:#1e3c72;font-size:14px;margin-bottom:8px;"><i class="bi bi-chat-dots me-2"></i>Catatan Admin</p>
                        <div class="catatan-box"><?= $pengajuan->catatan_admin ?></div>
                    </div>
                <?php endif; ?>

                <div class="row mt-5">
                    <div class="col-6 text-center">
                        <p style="font-size:13px;color:#666;">Mahasiswa,</p>
                        <div style="height:60px;"></div>
                        <p style="font-size:13px;font-weight:600;border-top:1px solid #ddd;padding-top:8px;"><?= $pengajuan->nama_mahasiswa ?></p>
                        <p style="font-size:12px;color:#888;margin-top:-5px;">NIM. <?= $pengajuan->nim ?></p>
                    </div>
                    <div class="col-6 text-center">
                        <p style="font-size:13px;color:#666;">Admin/Staf TU,</p>
                        <div style="height:60px;"></div>
                        <p style="font-size:13px;font-weight:600;border-top:1px solid #ddd;padding-top:8px;">Staf Tata Usaha</p>
                        <p style="font-size:12px;color:#888;margin-top:-5px;">Universitas Bumigora</p>
                    </div>
                </div>
            </div>

            <div class="print-footer no-print">
                <a href="<?= site_url('pengajuan') ?>" class="btn-back">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
                <button class="btn-print" onclick="window.print()">
                    <i class="bi bi-printer me-2"></i>Cetak / Save PDF
                </button>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>