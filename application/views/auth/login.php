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
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .logo-area {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo-icon i {
            font-size: 32px;
            color: white;
        }

        .logo-area h4 {
            color: #1e3c72;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .logo-area p {
            color: #888;
            font-size: 13px;
            margin: 0;
        }

        .form-label {
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }

        .input-group-text {
            background: #f0f4ff;
            border: 1.5px solid #dce3f5;
            color: #1e3c72;
        }

        .form-control {
            border: 1.5px solid #dce3f5;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 0 8px 8px 0;
        }

        .form-control:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        .input-group .input-group-text {
            border-radius: 8px 0 0 8px;
        }
    </style>
</head>
<body>

</body>
</html>