<?php
session_start();
session_unset();
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $sql = "select * from reset_token where token='$token'";
    $connection = new mysqli("localhost", "root", "", "blog");
    $result = $connection->query($sql);
    if($result->num_rows > 0){
        $email = $result->fetch_all()[0][1];
    }
    else{
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
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

    <title>Document</title>
</head>
<body>
<?php include "components/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Reset</div>
                <div class="card-body">
                    <?php include 'partials/errors.php'; ?>
                    <form method="post" action="/submit.php">
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" name="username" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <input type="text" value="password-reset" name="type" hidden>
                        <?php
                        echo " <input type='text' value='$email' name='token-email' hidden>";
                        ?>

                        <button type="submit" class="btn btn-primary w-100 mt-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>
https://sg-links.stackoverflow.email/ls/click?upn=
FhKQFemTFIJzn5ywFPMHvni76Wx7eeSM4UTVwzVAAnDy-2BrPkue1TYAO1ZTOpKPHO488N7MkC4vxwMyM-2BOvXHAlnwz-2B8CuHfqQzB6p-2BUs1IWjBAEVi-2F4as1GojomU3e2Ojt215mZOjU2Flm6xOtnzMJIlhgQJ-2Fy4jiQtPBB6QtyvYj9D7SGsvm2KVuSluzlpYq24DLOAvszzzbq0dTHJdn46166Js7F-2Fl-2BhXE5frX6O3vKLIjnGqX8GxINqS-2FTjQOyR-2FcqXsAYFn8crTvJy6FcC5EcT6-2BUbPlcXHpSUMGmR0-3DD6MJ_M0AO-2BuiyxDxNr-2F66eSRHo020zT7770FtP08i-2BSVFy-2F1foi2M08MBNi3T5C0TR4ZP1q8PHEn6MobAT-2BR5en29Bs4Qzusr7SSRUEzChXtbjpxLD3V0dcpY2kYCPmtYuNkh0wMQYdGY3VY3AGP3LjZWEGDV4wvYU8sw404n3PjukrfiGXmYaTVgqeoZ0hiJ-2FX04ttNwo-2F-2Fs-2BgiyI1q5-2FZjXE6CfHAJWA8yCHXDs0rCb44e7Nfp6zRaeJ0vZDaiFfNHdEjmH0JaCgTP-2BpGtLhTOOKVkHaerMq8hPkeH8Wztbu6dSmbCERzL4lo5-2F73aM2R2KRQ2me9Ogj9eIMKqhvXaP7FZYphxKD34mDlnba45ZIrPpyMjE0snM9a63Je2dtbr8cKtYPPFwJbOaC0zgedn-2Bm3UFgzimaaMTMj4-2FOk5mUEzcnAxgP1JPJbcsIu6M-2FJmibrLKP3yVcqL3s5-2FitRka4SNKZWK-2FLFVX7jbQF-2B4DZbiNU-2FEgQrFsb6FkJGBknvQ1TyYNoCZDFv0de6HURU9Qfw-3D-3D