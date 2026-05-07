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

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; padding: 40px 0;">
    <div class="col-md-6 col-lg-5"> <div class="card p-4 shadow-lg" style="background: rgba(0, 0, 0, 0.7); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
            
            <div class="brand-logo text-center">
                <h2 class="fw-bold mb-4 text-white">Create Account</h2>
            </div>

            <?= $message; ?>
            
            <form action="register.php" method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label text-white">Full Name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name" required>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label text-white">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label text-white">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label text-white">Confirm</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm" required>
                    </div>
                </div>

                <button type="submit" class="btn w-100 fw-bold mt-2" style="background-color: #00bfa5; color: black; border-radius: 10px; padding: 12px; border: none;">
                    Register Now
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="small text-white-50">Already have an account? 
                    <a href="login.php" style="color: #00bfa5; text-decoration: none; font-weight: bold;">Login here.</a>
                </p>
            </div>
        </div>
    </div>
</div>