<?php
    require_once('config.php');

    include('connect.php');

    $title=htmlspecialchars($_GET['title'], ENT_QUOTES);
    $auth=htmlspecialchars($_GET['auth'], ENT_QUOTES);
    $image=htmlspecialchars($_GET['image'], ENT_QUOTES);
    $contID=htmlspecialchars($_GET['contId'], ENT_QUOTES);
    $id=htmlspecialchars($_SESSION['id'], ENT_QUOTES);
    $sublistID=htmlspecialchars($_GET['subId'], ENT_QUOTES);

    $debug=$title." ".$auth." ".$image." ".$contID." ".$id." ".$sublistID;

    $trackS="INSERT INTO tbl_tracks VALUES(NULL,'{$title}','youtube','{$contID}','{$auth}',0,'{$image}')";
    $trackQ=mysqli_query($link,$trackS);

    if($trackQ){
        $qstring = "SELECT * FROM tbl_tracks ORDER BY tracks_id DESC LIMIT 1";
        $idQ=mysqli_query($link,$qstring);
        $lastCon = mysqli_fetch_array($idQ);
        $lastID = $lastCon['tracks_id'];

        //sending a query to tie users to tracks
        $userS="INSERT INTO tbl_users_tracks VALUES(NULL,$id,$lastID)";
        $userTrackQ=mysqli_query($link,$userS);

        //sending a query to tie sublists to tracks
        $sublistS="INSERT INTO tbl_sublist_tracks VALUES(NULL,$sublistID,$lastID)";
        $sublistTrackQ=mysqli_query($link,$sublistS);

        //Query here for upvotes binds, might not use built in upvotes
        $upvoteS="INSERT INTO tbl_upvotes VALUES(NULL,$id,$lastID)";
        $upvoteQ=mysqli_query($link,$upvoteS);

    }else{
        echo json_encode("Failed at init.");
    }

    mysqli_close($link);

    echo json_encode($trackS);
?>