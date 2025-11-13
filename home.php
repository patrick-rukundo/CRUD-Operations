<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            text-align: center;
            margin-top: 50px;
        }
        a {
            margin: 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['customer_name']); ?>!</h2>
    <p>You are now logged in to the Restaurant Ordering System.</p>
    <a href="viewProduct.php">View All Products</a>
    <a href="logout.php">Logout</a>
</body>
</html>
