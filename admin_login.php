<?php
session_start();
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
    header('Location: admin_dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="admin_login_process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
