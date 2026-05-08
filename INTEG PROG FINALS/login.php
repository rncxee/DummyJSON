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

<div class="auth-card text-center">
    <div class="auth-title">Welcome back!</div>
    <p class="auth-subtitle">Sign in to access your personal journey</p>

    <?php if($error): ?>
        <div class="alert alert-danger py-2 small bg-transparent border-danger text-danger mb-4" style="border-radius: 15px;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Your Username" required>
        </div>

        <div class="form-group">
            <div class="d-flex justify-content-between">
                <label class="form-label">Password</label>
                <a href="#" class="auth-link small" style="font-size: 0.7rem; opacity: 0.6;">Forgot Password?</a>
            </div>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <div class="d-flex align-items-center mb-4 px-3">
            <input type="checkbox" id="remember" class="form-check-input bg-transparent border-secondary">
            <label for="remember" class="small text-muted ms-2 mb-0">Remember me</label>
        </div>

        <button type="submit" class="btn btn-auth">Log In</button>
    </form>

    <div class="auth-footer">
        <br>
        Don't have an account? <a href="register.php" class="auth-link">Sign Up</a>
    </div>
</div>