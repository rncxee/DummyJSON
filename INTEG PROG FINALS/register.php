<?php 
include 'db.php'; 
include 'layout.php'; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password']; 

    if ($pass !== $confirm_pass) {
        $message = "<div class='alert alert-danger'>Passwords do not match!</div>";
    } else {
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $full_name, $email, $user, $hashed_password);
        
        if ($stmt->execute()) {
    $message = "<div class='alert alert-success text-center mx-auto shadow-sm' style='max-width: 500px; border-radius: 12px;'>
                    Registration successful. <a href='login.php' class='fw-bold' style='text-decoration: none;'>Login here</a>
                </div>";
} else {
    $message = "<div class='alert alert-danger text-center mx-auto shadow-sm' style='max-width: 500px; border-radius: 12px;'>
                    <strong>Error:</strong> " . $stmt->error . "
                </div>";
}
$stmt->close();
    }
}
?>

<div class="auth-card text-center" style="max-width: 480px;">
    <div class="auth-title">Create account</div>
    <p class="auth-subtitle">Join us to start your adventure</p>

    <?= $message; ?>

    <form action="register.php" method="POST">
        <div class="form-group">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" placeholder="Enter Your Full Name" required>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Confirm</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-auth">Sign Up</button>
    </form>

    <div class="auth-footer">
        <br>
        Already a member? <a href="login.php" class="auth-link">Log In</a>
    </div>
</div>