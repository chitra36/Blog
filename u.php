<?php

$hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$database = 'blog';

$connection = mysqli_connect($hostname, $db_username, $db_password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "INSERT INTO user1(username, password) VALUES ('$username', '$password')";

if (mysqli_query($connection, $sql)) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
