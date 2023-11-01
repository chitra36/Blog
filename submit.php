<?php
session_start();


$connection = new mysqli("localhost", "root", "", "blog");
if (isset($_POST['type']) && $_POST["type"] === "login") {
    login();
} elseif (isset($_POST['type']) && $_POST["type"] === "register") {
    register();
} elseif (isset($_POST['type']) && $_POST["type"] === "reset") {
    resetPassword();
} elseif (isset($_POST['type']) && $_POST["type"] === "password-reset") {
    updatePassword();
} elseif (isset($_POST['type']) && $_POST["type"] === "write-post") {
    createPost();
}
if (isset($_GET['type']) && $_GET["type"] === "logout") {
    session_unset();
    header("location: login.php");
}

function register(): void
{
    global $connection;
    $error = [];
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];

    if ($password !== $confirmPassword) {
        $error[] = "Password and confirm password do not match";
    }
    if (strlen($password) < 8) {
        $error[] = "Password must be of length 8";
    }
    if (!checkUniqueUsername($username)) {
        $error[] = "username already taken";
    }
    $hashed = md5($password);
    if (count($error) == 0) {
        try {
            $sql = "insert into user1(username,email,password) values('$username','$email','$hashed')";
            $result = $connection->query($sql);
            if ($result) {
                header("Location: login.php");
            } else {
                $error[] = "unable to create your account ";
                $_SESSION['error'] = json_encode($error);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        } catch (Exception $e) {
            $error[] = "unable to create your account " . $e->getMessage();
            $_SESSION['error'] = json_encode($error);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['error'] = json_encode($error);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

function checkUniqueUsername($username): bool
{
    global $connection;
    $sql = "SELECT username FROM user1 where username= '$username'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        return false;
    } else {
        return true;
    }

}

function login(): void
{
    global $connection;
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = md5($_REQUEST['password']);
    $query = "select * from user1 where username='$username' and password='$password'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $_SESSION['auth'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");
    } else {
        $_SESSION['error'] = json_encode(["Invalid Credentials"]);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
    return;
}

function resetPassword(): void
{
    global $connection;
    $email = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL);
    $query = "select * from user where email='$email'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $token = sha1(microtime());
        $query = "insert into reset_token(email,token) values('$email','$token')";
        $result = $connection->query($query);
        $link = "/reset.php?token=$token";
        $_SESSION['error'] = json_encode(["Reset Link has Been Sent " . $link]);
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['error'] = json_encode(["No User Found with this email"]);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }

    return;
}

function updatePassword(): void
{
    global $connection;
    $email = filter_var($_REQUEST['token-email'], FILTER_VALIDATE_EMAIL);
    $password = md5($_REQUEST['password']);
    $query = "UPDATE user SET password='$password' WHERE email='$email'";
    $result = $connection->query($query);
    header("location: login.php");
}


function createPost(): void
{
    $errors = [];
    global $connection;
    $banner = $_FILES['banner']; // File Size Validate , must be less than 5MB, byte , 1024 1KB, 5 * 1024 * 1024
    if ($banner['size'] > 5 * 1024 * 1024) {
        $errors[] = "File size must be less than 5MB";
    }
    $content = $_POST['content'];
    $title = $_POST['title'];
    if (strlen($title) < 10) {
        $errors[] = "Title must be less than 10 characters";
    }
    if (count($errors) > 0) {
        $_SESSION['errors'] = json_encode($errors);
        return;
    }
    $filename = "banner/" . md5(microtime()) . ".jpg";
    move_uploaded_file($banner['tmp_name'], $filename);
    $username = $_SESSION['username'];
    $getUser = "select * from user1 where username='$username'"; 
    $getUserResult = $connection->query($getUser);
    if ($getUserResult->num_rows <= 0) {
        throw new Exception("User not found");
    }
    $userId = $getUserResult->fetch_assoc()['id'];
    $sql = "insert into post(user_id,title,content,banner) values($userId,'$title','$content','$filename')";
    try{
        $result = $connection->query($sql);
        unset($_SESSION['error']);
        header("location: index.php");
    }catch (Exception|mysqli_sql_exception $e){
        $errors[] = $e->getMessage();
        $_SESSION['error'] = json_encode($errors);
        header("location: " . $_SERVER['HTTP_REFERER']);
        return;
    }


}

if (isset($_POST['delete_post'])) {
     $postToDelete = $_POST['delete_post_id'];

 $sql = "DELETE FROM post WHERE post_id = $postToDelete";

   $result = $connection->query($sql);
 if ($result) {
        
        header("location: write-post.php");
    } else {
      
        echo "Error deleting post.";
    }
}



