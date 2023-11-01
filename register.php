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
    <title>Register</title>
</head>
<body>
<?php include "components/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Signup</div>
                <div class="card-body">
                    <?php include "partials/errors.php"; ?>
                    <form method="post" action="submit.php">
                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                   placeholder="Enter your username"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Enter your email" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Enter your password"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="confirmPassword"
                                   placeholder="Confirm your password" required>
                        </div>
                        <input type="text" value="register" name="type" hidden>
                        <button type="submit" class="btn btn-primary w-100 mt-5">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>