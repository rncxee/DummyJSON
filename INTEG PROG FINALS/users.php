<?php
session_start();
if (!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit(); 
}

include 'layout.php';

$response = file_get_contents("https://dummyjson.com/users?limit=15");
$userData = json_decode($response, true);
$users = $userData['users'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">MyIntegrativeApp</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="products.php">Products</a>
            <a class="nav-link active" href="users.php">Users</a>
            <a class="nav-link" href="posts.php">Posts</a>
            <a class="nav-link text-danger" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4 text-center text-white fw-bold">Users Management</h2>
    
    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4 mb-4">
                <div class="card dashboard-card shadow-sm h-100 p-2">
                    <div class="card-body text-center">
                        <img src="<?= $user['image'] ?>" class="rounded-circle mb-3 border border-teal" width="80" style="border-color: #00bfa5 !important;">
                        
                        <h5 class="fw-bold text-white"><?= $user['firstName'] . " " . $user['lastName'] ?></h5>
                        <p class="small mb-1 text-white-50">Email: <?= $user['email'] ?></p>
                        <p class="small mb-1 text-white-50">Age: <?= $user['age'] ?> | Phone: <?= $user['phone'] ?></p>
                        
                        <a href="user_cart.php?user_id=<?= $user['id'] ?>&name=<?= urlencode($user['firstName'] . ' ' . $user['lastName']) ?>" 
                           class="btn btn-action mt-3 w-100" style="background-color: #00bfa5; color: black; font-weight: bold;">
                           View Cart
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>