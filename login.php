<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Login - Restaurant</title>
    <style>
        body {
            background: #fafafa;
            font-family: Arial;
        }
        .login-container {
            width: 350px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Restaurant Customer Login</h2>
        <form action="" method="POST">
            <label>Email:</label>
            <input type="text" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">&nbsp;&nbsp;
            <input type="submit" value="signup">
        </form>
    </div>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // MD5 to match DB

    $sql = "SELECT * FROM Customers WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['customer_name'] = $row['customer_name'];
        
        $_SESSION['email'] = $row['email'];
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid Email or Password'); window.location='login.php';</script>";
    }
}
?>

</body>
</html>
