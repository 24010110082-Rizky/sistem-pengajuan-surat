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

</html>