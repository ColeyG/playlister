<?php
    // Get the video object here
    $string=$_GET['url'];
    $urlPieces=explode("?v=",$string);
    $yid = substr($urlPieces[1],0,11);

    $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $yid . '&format=json'); //get JSON video details
    $details = json_decode($json, true); //parse the JSON into an array

    echo json_encode($details);
?>