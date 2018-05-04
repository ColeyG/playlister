<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    function createUser($un,$fun,$em,$pass){
        //echo $un.' '.$fun.' '.$em.' '.$pass;
        include('connect.php');

        $checkDB = "SELECT * FROM tbl_users WHERE users_uName = '{$un}'";
        $userCheck = mysqli_query($link,$checkDB);
        $foundUserCheck=mysqli_fetch_array($userCheck,MYSQLI_ASSOC);
        if($foundUserCheck['users_id']>0){
            $errmsg = "Username is taken.";
            return $errmsg;
        }else{
        $reg='regUser';
        $createQ="INSERT INTO tbl_users VALUES(NULL,'{$un}','{$pass}','{$fun}','{$em}','{$reg}',NULL)";
        $creating=mysqli_query($link,$createQ);
            if($creating){
                echo 'Success!';
            }else{
                echo 'Failure!';
            }
        }

        //(NULL,'{$username}','$enPass','{$email}',NULL,NULL,'{$userlvl}','{$fname}',FALSE,'$creationDate',TRUE)";
    }
?>