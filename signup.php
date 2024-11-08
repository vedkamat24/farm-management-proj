<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    // Insert user data into the employee table
    $stmt = $pdo->prepare("INSERT INTO employee (name, email, phone, salary) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $salary]);

    echo "Account created successfully. <a href='login.php'>Login now</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form action="signup.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" required><br><br>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" required><br><br>

            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
