<?php
session_start(); 
include 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}

include 'layout.php';
?>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-4"> 
        <div class="card p-4 shadow-lg" style="background: rgba(0, 0, 0, 0.6); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
            
            <h2 class="text-center text-white fw-bold mb-4">Login</h2>

            <?php if($error): ?>
                <div class="alert alert-danger py-2 small"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label text-white">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-white">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn w-100 fw-bold" style="background-color: #00bfa5; color: black; border-radius: 10px; padding: 12px;">
                    Login
                </button>

                <div class="mt-4 text-center">
                    <p class="small text-white-50">Don't have an account? 
                        <a href="register.php" style="color: #00bfa5; text-decoration: none; font-weight: bold;">Register here.</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
