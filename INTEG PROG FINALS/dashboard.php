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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">MyIntegrativeApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="posts.php">Posts</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="mb-5">
        <h2 class="fw-bold">Welcome, <?php echo $_SESSION['username']; ?>! 👋</h2>
        <p style="color: white !important; opacity: 0.8;">
    You are now logged in. Access the main categories below or use the navigation menu.
</p>
    </div>

        <div class="row g-4 justify-content-center">
    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card h-100 p-3"
            onclick="window.location.href='products.php';">
            <div class="card-body text-center">
                <div style="font-size: 3rem;" class="mb-3">🛒</div>
                <h5 class="card-title text-white fw-bold">Products</h5>
                <p class="card-text text-white-50 small mb-4">
                    Browse the catalog from DummyJSON API.
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card h-100 p-3"
            onclick="window.location.href='users.php';">
            <div class="card-body text-center">
                <div style="font-size: 3rem;" class="mb-3">👥</div>
                <h5 class="card-title text-white fw-bold">Users</h5>
                <p class="card-text text-white-50 small mb-4">View user profiles and account details.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-card h-100 p-3"
            onclick="window.location.href='posts.php';">
            <div class="card-body text-center">
                <div style="font-size: 3rem;" class="mb-3">📝</div>
                <h5 class="card-title text-white fw-bold">Posts</h5>
                <p class="card-text text-white-50 small mb-4">Read community blog posts and tags.</p>
            </div>
        </div>
    </div>
</div>