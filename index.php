<?php
session_start();
require 'db.php';

$stmt = $pdo->query("SELECT * FROM donations");
$donations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donation Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Available Donations</h1>
    <ul>
        <?php foreach ($donations as $donation): ?>
            <li>
                <h2><?php echo htmlspecialchars($donation['title']); ?></h2>
                <p><?php echo htmlspecialchars($donation['description']); ?></p>
                <p>Amount: <?php echo htmlspecialchars($donation['amount']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user']['username']); ?> | <a href="logout.php">Logout</a></p>
        <?php if ($_SESSION['user']['user_type'] === 'charity'): ?>
            <p><a href="add_donation.php">Add Donation</a></p>
        <?php endif; ?>
    <?php else: ?>
        <p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>
    <?php endif; ?>
</body>
</html>
