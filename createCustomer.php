<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
        /* General body styles */
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container */
        .form-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 350px;
        }

        /* Form header */
        .form-container h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        /* Labels */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Input fields */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Submit button */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }
        a{
            border-radius: 10px;
            background-color: #45a049;
            padding: 10px;
            text-decoration: none;
            color: white;
            margin-left: 150px;
            
        }

        /* Responsive */
        @media (max-width: 400px) {
            .form-container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Customer Registration</h3>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" name="submit" value="Register"><br><br><br>
             <a href="login.php">LOGIN</a>
        </form>
    
    </div>

    <?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Optional: hash the password for security
        $password_hashed = md5($password);

        $sql = "INSERT INTO Customers(customer_name, email, password) 
                VALUES ('$username','$email','$password')";

        if(mysqli_query($conn, $sql)){
            echo "<script>alert('✅ Data recorded successfully!');</script>";
        }else{
            echo "<script>alert('❌ Data not recorded');</script>" . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
