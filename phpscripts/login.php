<?php
    function login($username,$password){
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        include('connect.php');
        $enPass=password_hash($password, PASSWORD_DEFAULT);
        $userQ="SELECT * FROM tbl_users WHERE users_uName = '{$username}'";
        $query=mysqli_query($link,$userQ);
        $foundUser  = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if(password_verify($password,$foundUser['users_password'])){
            if($foundUser['users_accLevel']==='susUser'){
                $errmsg= "This account seems to be suspended.";
                return $errmsg;
            }else{
                $_SESSION['id'] = $foundUser['users_id'];
                $_SESSION['fName'] = $foundUser['users_fullName'];
                $_SESSION['uName'] = $foundUser['users_uName'];
                $_SESSION['level'] = $foundUser['users_accLevel'];
                $_SESSION['timeStart'] = date('U');
                // echo $_SESSION['id'];
                redirect_to('home.php');
            }
        }else{
            $errmsg= "Username or Password is incorrect.";
            return $errmsg;
        }
        mysqli_close($link);
    }
?>