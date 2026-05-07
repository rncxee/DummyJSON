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

            --text: #1f2937;
            --text-light: #6b7280;
            --text-dark: #111827;
            
            --border: #e5e7eb;
            --border-focus: #d1d5db;
            
            --success: #10b981;
            --success-light: #d1fae5;
            --success-dark: #065f46;
            
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --danger-dark: #991b1b;
            
            --spacing-xs: 4px;
            --spacing-sm: 8px;
            --spacing-md: 16px;
            --spacing-lg: 24px;
            --spacing-xl: 32px;
            
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 12px;
            --radius-full: 9999px;
            
            --shadow-sm: 0 1px 2px rgba(156, 0, 0, 0.05);
            --shadow-md: 0 4px 10px rgba(136, 0, 0, 0.379);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            --shadow-modal: 0 20px 40px rgba(0, 0, 0, 0.2);
            
            --transition-fast: 0.15s ease;
            --transition-normal: 0.2s ease;
            --transition-slow: 0.3s ease-out;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        .product-image-container {
            position: relative;
            height: 250px;
            background: linear-gradient(135deg, #2c5364, #203a43);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image-container::before {
            content: '';
            position: absolute;
            bottom: -50px;
            width: 120%;
            height: 100px;
            background: var(--card-dark);
            border-radius: 50%;
        }

        .product-img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            z-index: 1;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.5));
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.6);
            color: var(--primary-teal);
            padding: 5px 15px;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(0, 191, 165, 0.3);
        }

        .dashboard-card:hover .product-img {
            transform: scale(1.1) rotate(3deg);
        }

        .dashboard-card:hover .btn-card {
            background-color: #fff !important;
            transform: translateY(-2px);
        }

        .btn-action:hover {
            background-color: #fff !important;
            transform: translateY(-2px);
        }
    </style>
</head>