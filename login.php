<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth']){
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "partials/meta.php"; ?>
    <title>Login</title>
</head>
<body>
<?php include "components/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <?php include 'partials/errors.php'; ?>
                    <form method="post" action="/submit.php">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <input type="text" value="login" name="type" hidden>
                        <a href="/reset-password.php" class="mt-3 text-decoration-none">Forgot Password ?</a>
                        <button type="submit" class="btn btn-primary w-100 mt-5">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>



