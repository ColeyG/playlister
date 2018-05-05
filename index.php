<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once('phpscripts/config.php');
    include('phpscripts/connect.php');

    $suserString='SELECT * FROM tbl_users';
    $userSet=mysqli_query($link,$suserString);
    $users=mysqli_fetch_array($userSet, MYSQLI_ASSOC);

    //print_r($users);

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        if($username==''||$password==''||$fullname==''||$email==''){$errmsg='Missed a field';}
        //echo $username." ".$fullname." ".$email." ".$password;
        $result=createUser($username,$fullname,$email,$password);
        $errmsg=$result;
    }

    echo randPass(32);

    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <form action="index.php" method="post">
        <p>Username:</p>
        <input type="text" name="username" value="<?php if(isset($username)){echo $username;}?>" class="input-group">
        <br>
        <p>Full Name:</p>
        <input type="text" name="fullname" value="<?php if(isset($fullname)){echo $fullname;}?>" class="input-group">
        <br>
        <p>Email:</p>
        <input type="text" name="email" value="<?php if(isset($email)){echo $email;}?>" class="input-group">
        <br>
        <p>Password:</p>
        <input type="password" name="password" value="<?php if(isset($password)){echo $password;}?>" class="input-group">
        <br>
        <?php if(!empty($errmsg)){echo "<p class='danger'>".$errmsg."</p>";}?>
        <input type="submit" name="submit" value="Create User" class="btn btn-info m-1">
    </form>
    <script src='js/main.js'></script>
</body>
</html>