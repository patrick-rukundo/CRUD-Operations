<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Sign Up Clone</title>
    
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

.signup-box {
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

.subtitle {
    color: #777;
    font-size: 14px;
}

.fb-btn {
    width: 100%;
    padding: 10px;
    background: #0095f6;
    border: none;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    margin-top: 15px;
}

.divider {
    margin: 20px 0;
    font-size: 12px;
    color: #999;
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
    color: white;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
}

.terms {
    font-size: 12px;
    color: #888;
    margin-top: 15px;
}

.login-box {
    width: 350px;
    background: #fff;
    border: 1px solid #dbdbdb;
    padding: 20px;
    font-size: 14px;
}

</style>
<body>

<div class="container">

    <div class="signup-box">
        <h1 class="logo">Instagram</h1>

        <p class="subtitle">Sign up to see photos and videos from your friends.</p>

        <button class="fb-btn">Log in with Facebook</button>

        <div class="divider">OR</div>

        <form method="post">
    <input type="email/text" placeholder="Mobile Number or Email" name="email" required>
    <input type="text" placeholder="Full Name" name="fullname" required>
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>

    <button type="submit" class="btn" name="submit">Sign Up</button>
</form>


        <p class="terms">
            By signing up, you agree to our Terms, Privacy Policy and Cookies Policy.
        </p>
    </div>

    <div class="login-box">
        Have an account? <a href="instagramLogin.php">Log in</a>
    </div>

</div>

<?php
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $username = $_POST[ "username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users(email,fullName,username,password) 
    values('$email','$fullname','$username','$password')";
    if(mysqli_query($conn, $sql)){
        echo "<script> alert('data successfully')</script>";
        
    }else{
        echo "not inserted".mysqli_error($conn);
    }

    
}
?>

</body>
</html>
