<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_id = $_GET['user_id'];
$user_query = "SELECT username, profile_picture FROM users WHERE id = $user_id";
$post_query = "SELECT title FROM posts WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 5";

$user_result = $conn->query($user_query);
$post_result = $conn->query($post_query);

if ($user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['username']; ?>'s Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['username']; ?></h1>
    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture" width="100">
    <h2>Last 5 Post Titles:</h2>
    <ul>
        <?php while ($row = $post_result->fetch_assoc()) { ?>
            <li><?php echo $row['title']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
} else {
    echo "User not found.";
}

$conn->close();
?>
