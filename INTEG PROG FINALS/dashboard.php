<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

function fetchAPI($url) {
    $response = @file_get_contents($url);
    return json_decode($response, true);
}

include 'layout.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">MY<span style="color:white">INTEGRATIVE</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="posts.php">Posts</a></li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger px-3 ms-lg-3" 
                       style="border-radius: 50px; border-color: rgba(220, 53, 69, 0.5);" 
                       href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-white">Welcome, <span style="color: var(--neon-green);"><?php echo $_SESSION['username']; ?></span>! 👋</h2>
        <p class="text-white-50">Select a module to manage your integrative system.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card" onclick="window.location.href='products.php';">
                <div class="card-body">
                    <div class="card-icon-wrapper">🛒</div>
                    <h5 class="card-title text-white fw-bold">Products</h5>
                    <p class="card-text text-white-50">
                        Browse the catalog from DummyJSON API.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card" onclick="window.location.href='users.php';">
                <div class="card-body">
                    <div class="card-icon-wrapper">👥</div>
                    <h5 class="card-title text-white fw-bold">Users</h5>
                    <p class="card-text text-white-50">View user profiles and account details.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card dashboard-card" onclick="window.location.href='posts.php';">
                <div class="card-body">
                    <div class="card-icon-wrapper">📝</div>
                    <h5 class="card-title text-white fw-bold">Posts</h5>
                    <p class="card-text text-white-50">Read community blog posts and tags.</p>
                </div>
            </div>
        </div>
    </div>
</div>