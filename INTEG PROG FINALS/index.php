<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
include 'layout.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | DummyJSON Web App</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .hero-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            max-width: 600px;
        }
        .btn-custom {
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 30px;
            transition: 0.3s;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="hero-section mx-auto shadow-lg">
        <h1 class="display-4 fw-bold mb-3">DummyJSON API Web App</h1>
        
        <p class="lead mb-5">
            A comprehensive integrative programming project showcasing real-time API management, 
            secure user authentication, and dynamic data visualization for products, users, and community posts.
        </p>

        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="login.php" class="btn btn-primary btn-lg btn-custom px-5 shadow">Login</a>
            <a href="register.php" class="btn btn-outline-light btn-lg btn-custom px-5">Register</a>
        </div>
        
        <p class="mt-5 mb-0 small opacity-75">
            Integrative Programming & Technologies | Universidad de Dagupan
        </p>
    </div>
</div>

</body>
</html>