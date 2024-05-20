<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $user_type]);

    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Register</h1>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>User Type:</label>
        <select name="user_type" required>
            <option value="donor">Donor</option>
            <option value="charity">Charity Organization</option>
        </select>
        <button type="submit">Register</button>
    </form>
</body>
</html>
