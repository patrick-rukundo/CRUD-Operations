<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Login Clone</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background: #fafafa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
}

.login-box {
    width: 350px;
    background: #fff;
    border: 1px solid #dbdbdb;
    padding: 30px;
    margin-bottom: 10px;
}

.logo {
    font-family: 'Billabong', cursive;
    font-size: 48px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #dbdbdb;
    background: #fafafa;
}

.btn {
    width: 100%;
    padding: 10px;
    background: #0095f6;
    border: none;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

.divider {
    margin: 15px 0;
    font-size: 12px;
}

.fb-login {
    color: #385185;
    font-weight: bold;
    text-decoration: none;
}

.forgot {
    display: block;
    margin-top: 10px;
    font-size: 12px;
}

.signup-box {
    width: 350px;
    background: #fff;
    border: 1px solid #dbdbdb;
    padding: 20px;
}

</style>
<body>

<div class="container">
    <div class="login-box">
        <h1 class="logo">Instagram</h1>

        <form method="post">
            <input type="text" placeholder="Phone number, username, or email" name="username" required>
            <input type="password" placeholder="Password" name="password" required>

            <button type="submit" class="btn">Log In</button>
        </form>

        <div class="divider">OR</div>

        <a href="#" class="fb-login">Log in with Facebook</a>
        <a href="#" class="forgot">Forgot password?</a>
    </div>

    <div class="signup-box">
        Don't have an account? <a href="instagramSignup.php">Sign up</a>
    </div>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE  username='$username' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        header("location: login.php");
        exit();
    }else{
        echo "<script>alert('invalid username or password');
              window.location='instagramLogin.php';</script>".mysqli_error($conn);
    }

}
?>
</body>
</html>
