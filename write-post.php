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
    <title>Document</title>
    <?php include "partials/meta.php"; ?>

</head>
<body>
<?php include "components/header.php"; ?>
<div class="container">
    <?php include "partials/errors.php"; ?>
    <form enctype="multipart/form-data" action="submit.php" method="post">
        <div class="form-group">
            <label for="fileInput">File Upload</label>
            <input type="file" class="form-control-file" name="banner" id="fileInput" accept="image/*">
        </div>
        <div class="form-group">
            <label for="textarea">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="textarea">Textarea</label>
            <textarea class="form-control" id="textarea" name="content" rows="20" style="width: 100%;"></textarea>
        </div>
        <input type="text" name="type" value="write-post" hidden>
        <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
         <input type="text" name="delete_post_id" value="Submit.php" hidden>
    
   
    <button type="submit" class="btn btn-danger" name="delete_post">Delete Post</button>
    </form>
</div>


<?php include "components/footer.php"; ?>
</body>
</html>