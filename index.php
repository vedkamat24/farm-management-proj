<?php
session_start();
if (isset($_SESSION['user_type'])) {
    header('Location: user_dashboard.php'); // Redirect if already logged in
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        <p>Are you an admin? <a href="admin_login.php">Admin Login</a></p>
    </div>
</body>
</html>
