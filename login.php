<?php
require_once 'db.php';
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $email = mysqli_real_escape_string($conn, $email);
    $pass = mysqli_real_escape_string($conn, $pass);
    
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        echo '<script>alert("Email or password is not correct.");</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-color: #f44336; /* Red color */
    background-image: linear-gradient(315deg, #f44336 0%, #ff4e00 74%);
    color: #495057; /* Text color */
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.card-title {
    margin-bottom: 2rem;
    font-weight: 300;
    font-size: 1.5rem;
    color: #495057;
}
.form-control {
    border-radius: 2rem;
}
.btn-login {
    border-radius: 2rem;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 600;
    background-color: #f44336;
    border-color: #007bff;
    background-image: linear-gradient(315deg, #f44336 0%, #ff4e00 74%);
}
.btn-login:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
.form-group {
    position: relative;
}
.form-group i {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 1.2rem;
    color: #adb5bd;
}
.form-control {
    padding-left: 2.5rem;
}
</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card mt-5">
<div class="card-body">
<h5 class="card-title text-center">Login to Your Account</h5>
<form method="post">
<div class="form-group">
<i class="fa fa-envelope"></i>
<input type="email" class="form-control" name="email" placeholder="Email" required>
</div>
<div class="form-group">
<i class="fa fa-lock"></i>
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
<button type="submit" class="btn btn-primary btn-block btn-login" name="submit">Login</button>
<p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
</form>
</div>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
</body>
</html>
