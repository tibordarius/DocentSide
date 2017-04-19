<?php 
    require_once "../google/config.php";
        if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
            header("location:" . SITE_URL);
        exit();}
    include './header.php';
?>

<!DOCTYPE html>
<html>
<body>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <form class="form-inline" action="badgeUpload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Select image to upload (PNG):</label>
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <input class="btn btn-default" type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</body>
</html>