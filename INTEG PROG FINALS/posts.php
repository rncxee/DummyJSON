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

$postData = fetchAPI("https://dummyjson.com/posts?limit=15");
$posts = $postData['posts'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">MyIntegrativeApp</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="products.php">Products</a>
            <a class="nav-link" href="users.php">Users</a>
            <a class="nav-link active" href="posts.php">Posts</a>
            <a class="nav-link text-danger" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Community Posts</h2>
    
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary"><?= $post['title'] ?></h5>
                        
                        <div class="mb-2">
                            <?php foreach ($post['tags'] as $tag): ?>
                                <span class="badge bg-info text-dark me-1">#<?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>

                        <p class="card-text">
                            <?= substr($post['body'], 0, 120) ?>...
                        </p>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <div class="reactions">
                            <span class="me-3">👍 Likes: <strong><?= $post['reactions']['likes'] ?></strong></span>
                            <span>👎 Dislikes: <strong><?= $post['reactions']['dislikes'] ?></strong></span>
                        </div>
                        <small class="text-muted">Post ID: <?= $post['id'] ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>