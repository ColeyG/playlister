<?php
    $id=$_GET['id'];
    echo $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlister</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="link" value="">
        <input hidden type="text" value="<?php echo $id;?>">
        <input hidden id="submit" type="submit" name="submitCreate" value="Submit" class="btn btn-info m-1">
        <a href='#' id="submitReal">Submit</a>
    </form>
    <script src="js/main.js"></script>
</body>
</html>