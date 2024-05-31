<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$database_name = "movies";
$sql = "CREATE DATABASE IF NOT EXISTS $database_name";
if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($database_name);

if ($conn->connect_error) {
    die("Connection to movie database failed: " . $conn->connect_error);
}
?>
