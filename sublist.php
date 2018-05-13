<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    require_once('phpscripts/config.php');

    $id=$_GET['id'];
    //echo $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlister</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <h1>Master Playlist</h1>
    <form action="index.php" method="post">
        <input id='url' type="text" name="link" value="">
        <input hidden id="submit" type="submit" name="submitCreate" value="Submit" class="btn btn-info m-1">
        <input hidden id="subId" type="submit" name="subId" value="<?php echo $id;?>" class="btn btn-info m-1">
        <a href='#' id="submitReal">Submit</a>
    </form>
    <script src="js/main.js"></script>
</body>
</html>