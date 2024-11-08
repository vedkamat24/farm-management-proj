<?php
session_start();
if ($_SESSION['user_type'] != 'admin') {
    header('Location: admin_login.php');
}

include('db.php');

// Fetch all employees
$stmt = $pdo->prepare("SELECT * FROM employee");
$stmt->execute();
$employees = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <h3>All Employees:</h3>
    <ul>
        <?php foreach ($employees as $employee) { ?>
            <li><?php echo $employee['name']; ?> - <?php echo $employee['email']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
