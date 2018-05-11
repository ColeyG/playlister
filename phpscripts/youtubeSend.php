<?php
    require_once('config.php');

    $title=$_GET['title'];
    $auth=$_GET['auth'];
    $image=$_GET['image'];
    $contID=$_GET['contId'];
    $id=$_SESSION['id'];

    $debug=$title." ".$auth." ".$image." ".$contID." ".$id;

    //START HERE LATER

    echo json_encode($debug);
?>