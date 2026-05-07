<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Integrative Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s ease-in-out;
        }

        body {
            background: #111;
            background: -webkit-linear-gradient(to right, #2c5364, #203a43, #0f2027);
            background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
            color: #eee;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        :root {
            --primary-teal: #00bfa5;
            --primary-dark: #004d40;
            --card-dark: #222;
        }

        .content-main {
            margin-left: 0; 
            padding: 100px 40px; 
            transition: 0.3s;
        }

        .dashboard-card {
            background-color: var(--card-dark) !important;
            border: none !important;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: 0.3s;
            overflow: hidden;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 191, 165, 0.4) !important;
            background-color: #f8f9fa;
        }

        .dashboard-card .card-body {
            padding: 30px;
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-card {
            background-color: var(--primary-teal) !important;
            color: black !important;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            letter-spacing: -0.5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .btn-card:hover {
            background-color: #fff !important;
            color: black !important;
        }

        h2.page-header {
            color: var(--primary-teal);
            font-weight: 700;
            letter-spacing: -1px;
        }
    </style>
</head>