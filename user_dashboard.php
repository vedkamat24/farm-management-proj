<?php
session_start();
if ($_SESSION['user_type'] != 'user') {
    header('Location: login.php');
}

include('db.php');

// Fetch the user data from the session
$username = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM employee WHERE email = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Fetch the assigned plants and medicines for the user
$stmt2 = $pdo->prepare("SELECT * FROM plant_assignment pa 
                        JOIN plant p ON pa.plant_id = p.plant_id
                        JOIN medicine m ON pa.med_id = m.med_id
                        WHERE pa.eid = ?");
$stmt2->execute([$user['eid']]);
$assignments = $stmt2->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?php echo $user['name']; ?></h2>
    <h3>Your Plant Assignments:</h3>
    <ul>
        <?php foreach ($assignments as $assignment) { ?>
            <li><?php echo $assignment['plant_name']; ?> - <?php echo $assignment['med_name']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
