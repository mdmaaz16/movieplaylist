<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm-password'];
    if ($password == $confirm) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href = "login.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Password does not match.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign-Up Page</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-color: #f44336;
    background-image: linear-gradient(315deg, #f44336 0%, #ff4e00 74%);
    color: #495057;
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
.btn-signup {
    border-radius: 2rem;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 600;
    background-color: #f44336;
    border-color: #007bff;
    background-image: linear-gradient(315deg, #f44336 0%, #ff4e00 74%);
}
.btn-signup:hover {
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
<h5 class="card-title text-center">Create an Account</h5>
<form method="post">
<div class="form-group">
<i class="fa fa-user"></i>
<input type="text" class="form-control" name="username" placeholder="Username" required>
</div>
<div class="form-group">
<i class="fa fa-envelope"></i>
<input type="email" class="form-control" name="email" placeholder="Email" required>
</div>
<div class="form-group">
<i class="fa fa-lock"></i>
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
<div class="form-group">
<i class="fa fa-lock"></i>
<input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password" required>
</div>
<button type="submit" class="btn btn-primary btn-block btn-signup" name="submit">Sign Up</button>
<p class="text-center mt-3">Already have an account? <a href="login.php">Sign In</a></p>
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
