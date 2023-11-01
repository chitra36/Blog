<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "partials/meta.php"; ?>
    <title>Document</title>
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
                            <label for="username">Email</label>
                            <input type="email" name="email" class="form-control" id="username" placeholder="Enter your Email">
                        </div>
                        <input type="text" value="reset" name="type" hidden>
                        <button type="submit" class="btn btn-primary w-100 mt-5">Send Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>