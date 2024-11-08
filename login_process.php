<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user in database
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch();

    if ($admin) {
        $_SESSION['user_type'] = 'admin';
        $_SESSION['username'] = $username;
        header('Location: admin_dashboard.php');
    } else {
        $stmt = $pdo->prepare("SELECT * FROM employee WHERE email = ? AND phone = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user_type'] = 'user';
            $_SESSION['username'] = $username;
            header('Location: user_dashboard.php');
        } else {
            echo "Invalid login credentials.";
        }
    }
}
?>
