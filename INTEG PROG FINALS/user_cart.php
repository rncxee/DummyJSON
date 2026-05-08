<?php
session_start();
if (!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit(); 
}

include 'layout.php';

$id = $_GET['user_id'];
$name = $_GET['name'];

$response = file_get_contents("https://dummyjson.com/carts");
$cartData = json_decode($response, true);
$user_cart = null;

foreach ($cartData['carts'] as $cart) {
    if ($cart['userId'] == $id) {
        $user_cart = $cart;
        break;
    }
}
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Cart of <?= htmlspecialchars($name) ?></h4>
        </div>
        <div class="card-body">
            <?php if ($user_cart): ?>
                <div class="row text-center mb-4">
                    <div class="col-md-4"><strong>Cart ID:</strong> <?= $user_cart['id'] ?></div>
                    <div class="col-md-4"><strong>Total Products:</strong> <?= $user_cart['totalProducts'] ?></div>
                    <div class="col-md-4 text-primary"><strong>Total Amount:</strong> $<?= $user_cart['total'] ?></div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user_cart['products'] as $p): ?>
                            <tr>
                                <td><?= $p['title'] ?></td>
                                <td><?= $p['quantity'] ?></td>
                                <td>$<?= $p['price'] ?></td>
                                <td>$<?= $p['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">No cart found for this user.</div>
            <?php endif; ?>
            
            <a href="users.php" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>