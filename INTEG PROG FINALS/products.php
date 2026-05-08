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

$data = fetchAPI("https://dummyjson.com/products");
$products = $data['products'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">MyIntegrativeApp</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="posts.php">Posts</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4 text-center text-white fw-bold">Premuim Product Catalog</h2>

    <div class="row g-4">
        <?php foreach ($products as $p): ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card dashboard-card h-100 border-0" onclick="window.location.href='product-details.php?id=<?php echo $p['id']; ?>';">
                <div class="product-image-container">
                    <img src="<?php echo $p['thumbnail']; ?>" alt="<?php echo $p['title']; ?>" class="product-img">
                    <div class="category-badge"><?php echo ucfirst($p['category']); ?></div>
                </div>

                <div class="card-body d-flex flex-column text-start p-4">
                    <h4 class="fw-bold mb-1" style="color: #fff;"><?php echo $p['title']; ?></h4>
                    <p class="text-light opacity-75 small mb-3">
                        <?php echo substr($p['description'], 0, 80) . '...'; ?>
                    </p>
                    
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 fw-bold text-success">$<?php echo number_format($p['price'], 2); ?></span>
                            <div class="small opacity-50">Stock: <?php echo $p['stock']; ?> units</div>
                        </div>
                        <button class="btn btn-card px-4">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>