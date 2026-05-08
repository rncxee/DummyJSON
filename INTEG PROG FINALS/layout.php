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
        transition: all 0.3s ease;
    }

    body {
        background-color: var(--bg-black);
        background-image: radial-gradient(circle at center, rgba(0, 255, 102, 0.03) 0%, transparent 70%);
        min-height: 100vh;
        margin: 0;
        color: white;
        padding-top: 150px; /* This prevents the content from being hidden behind the navbar */
        display: block !important; /* Changed from flex to allow normal page flow */
    }

    /* Navigation Styles */
    .navbar {
        background: rgba(10, 10, 10, 0.8) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid var(--glass-border);
        padding: 15px 0;
    }

    .navbar-brand {
        color: var(--neon-green) !important;
        letter-spacing: -1px;
    }

    .nav-link {
        color: white !important;
        font-size: 0.9rem;
        font-weight: 500;
        margin: 0 10px;
        opacity: 0.7;
    }

    .nav-link:hover, .nav-link.active {
        color: var(--neon-green) !important;
        opacity: 1;
    }

    /* Frosted Glass Card with Black Tint */
    .auth-card {
        background: var(--card-bg);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        padding: 3.5rem 2.5rem;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8);
        text-align: center;
        margin: auto;
    }

    .auth-title {
        font-size: 2.2rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.5rem;
        letter-spacing: -1px;
    }

    .auth-subtitle {
        color: var(--text-muted);
        font-size: 0.85rem;
        margin-bottom: 2.5rem;
    }

    /* Pill-Shaped Inputs with Green Focus */
    .form-group {
        margin-bottom: 1.5rem;
        text-align: left;
    }

    .form-label {
        font-size: 0.75rem;
        color: var(--neon-green); /* Green labels */
        margin-left: 1.2rem;
        margin-bottom: 0.5rem;
        display: block;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid var(--glass-border) !important;
        border-radius: 50px !important;
        padding: 14px 22px !important;
        color: white !important;
        font-size: 0.95rem;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.2);
    }

    .form-control:focus {
        background: rgba(0, 255, 102, 0.05) !important;
        border-color: var(--neon-green) !important;
        box-shadow: 0 0 20px rgba(0, 255, 102, 0.15) !important;
        outline: none;
    }

    /* High-Contrast White/Green Button */
    .btn-auth {
        background: white; /* Clean white button like reference */
        color: black;
        border: none;
        border-radius: 50px;
        padding: 14px;
        font-weight: 700;
        width: 100%;
        margin-top: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-auth:hover {
        background: var(--neon-green);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 255, 102, 0.4);
    }

    .auth-link {
        color: var(--neon-green);
        text-decoration: none;
        font-weight: 600;
    }

    .auth-link:hover {
        text-decoration: underline;
        text-shadow: 0 0 10px rgba(0, 255, 102, 0.5);
    }

    /* Custom Checkbox */
    .form-check-input {
        background-color: transparent;
        border: 1px solid var(--neon-green);
    }
    
    .form-check-input:checked {
        background-color: var(--neon-green);
        border-color: var(--neon-green);
    }   

        :root {
            --bg-black: #050505;
            --card-bg: rgba(15, 15, 15, 0.7);
            --neon-green: #00ff66; /* Vibrant Green from your request */
            --glass-border: rgba(0, 255, 102, 0.15);
            --text-muted: rgba(255, 255, 255, 0.5);

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
            background-color: #1a1a1a !important; /* Match the dark grey in the screenshot */
    border: 1px solid rgba(255, 255, 255, 0.05) !important;
    border-radius: 32px; /* Very rounded corners as seen in the image */
    padding: 40px 20px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    height: 320px; /* Force a square-like aspect ratio */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
        }

        .dashboard-card:hover {
            transform: translateY(-12px);
    background-color: #1f1f1f !important;
    /* The specific neon green glow from your screenshot */
    box-shadow: 0 20px 40px rgba(0, 255, 102, 0.25) !important;
    border-color: var(--neon-green) !important;
        }

        .dashboard-card .card-body {
            padding: 30px;
        }

        .dashboard-card .card-title {
    font-size: 1.5rem;
    letter-spacing: -0.5px;
    margin-bottom: 12px;
}

.dashboard-card .card-text {
    font-size: 0.9rem;
    line-height: 1.5;
    max-width: 80%;
    margin: 0 auto;
}

        .card-icon-wrapper {
    font-size: 4rem; /* Larger icons */
    margin-bottom: 25px;
    filter: drop-shadow(0 5px 15px rgba(0,0,0,0.3));
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