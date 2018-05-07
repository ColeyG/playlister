<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once('phpscripts/config.php');
    include('phpscripts/connect.php');

    $suserString='SELECT * FROM tbl_users';
    $userSet=mysqli_query($link,$suserString);
    $users=mysqli_fetch_array($userSet, MYSQLI_ASSOC);

    if(isset($_POST['submitCreate'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        if(leng($username,32)==true){
            $errmsg='Username can only be 32 characters long.';
        }else if(leng($fullname,100)==true){
            $errmsg='Full name can only be 100 characters long.';
        }else if(leng($password,50)==true){
            $errmsg='Password can only be 50 characters long.';
        }else if(leng($email,375)==true){
            $errmsg='Email can only be 375 characters long.';
        }else{
        if($username==''||$password==''||$fullname==''||$email==''){$errmsg='Missed a field';}else{
            if(checkIns($username)==true&&checkIns($password)==true&&checkIns($fullname)==true&&checkIns($email)==true){
                if(strlen($password)<8){
                    $errmsg='Password length needs to be 8 characters or longer.';
                }else{
                    //echo $username."-".$fullname."-".$email."-".$password;
                    $result=createUser(dbEscape($link,$username),dbEscape($link,$fullname),dbEscape($link,$email),dbEscape($link,$password));
                    $errmsg=$result;
                }
            }else{
                $errmsg='No special characters please.';
            }
        }
        }
    }

    if(isset($_POST['submitLogin'])) {
        $usernameLG = dbEscape(trim($_POST['username']));
        $passwordLG = dbEscape(trim($_POST['password']));
        if($usernameLG==''||$passwordLG==''){$errmsg='Missed a field';}else{
            if(checkIns($usernameLG)==true&&checkIns($passwordLG)==true){
                // echo $username." ".$fullname." ".$email." ".$password;
                $result=login($usernameLG,$passwordLG);
                $errmsg=$result;
            }else{
                $errmsg='No special characters please.';
            }
        }
    }

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
        <input type="submit" name="submitCreate" value="Sign-Up" class="btn btn-info m-1">
        <?php if(!empty($errmsg)){echo "<p class='danger'>".$errmsg."</p>";}?>
    </form>
    <form action="index.php" method="post">
        <p>Username:</p>
        <input type="text" name="username" value="<?php if(isset($usernameLG)){echo $usernameLG;}?>" class="input-group">
        <br>
        <p>Password:</p>
        <input type="password" name="password" value="<?php if(isset($passwordLG)){echo $passwordLG;}?>" class="input-group">
        <br>
        <input type="submit" name="submitLogin" value="Login" class="btn btn-info m-1">
        <?php if(!empty($errmsgLG)){echo "<p class='danger'>".$errmsgLG."</p>";}?>
    </form>
    <script src='js/main.js'></script>
</body>
</html>