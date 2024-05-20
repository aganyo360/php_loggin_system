<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'charity') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $charity_id = $_SESSION['user']['id'];

    $stmt = $pdo->prepare("INSERT INTO donations (title, description, amount, charity_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $amount, $charity_id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Donation</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Add Donation</h1>
    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Description:</label>
        <textarea name="description" required></textarea>
        <label>Amount:</label>
        <input type="number" name="amount" step="0.01" required>
        <button type="submit">Add Donation</button>
    </form>
</body>
</html>
