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
    <h3 class="mb-4">📦 Products Catalog</h3>

    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Thumbnail</th> <th>Product Title</th> <th>Category</th> <th>Price</th> <th>Stock</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p): ?>
                <tr>
                    <td>
                        <img src="<?php echo $p['thumbnail']; ?>" alt="Product Image" style="width: 60px; height: 60px; object-fit: cover;" class="rounded border">
                    </td>
                    
                    <td class="fw-bold"><?php echo $p['title']; ?></td>
                    
                    <td><span class="badge bg-info text-dark"><?php echo ucfirst($p['category']); ?></span></td>
                    
                    <td class="text-success fw-bold">$<?php echo number_format($p['price'], 2); ?></td>
                    
                    <td><?php echo $p['stock']; ?> units</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>