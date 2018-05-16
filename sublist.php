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
    <?php include('includes/css.php');?>
</head>
<body>
    <h1>Master Playlist</h1>
    <form action="index.php" method="post">
        <input id='url' type="text" name="link" value="">
        <input hidden id="submit" type="submit" name="submitCreate" value="Submit" class="btn btn-info m-1">
        <input hidden id="subId" type="submit" name="subId" value="<?php echo $id;?>" class="btn btn-info m-1">
        <a href='#' id="submitReal"><p>Submit</p></a>
    </form>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Track</th>
      <th scope="col">Artist</th>
      <th scope="col">Upvotes</th>
      <th scope="col">Report</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><img class='art' src="placeholder/default.jpg" alt="album art"></td>
      <td>Dalenvance</td>
      <td>Ripper Dinksy</td>
      <td>1302</td>
      <td>X</td>
    </tr>
    <tr>
      <td><img class='art' src="placeholder/default.jpg" alt="album art"></td>
      <td>Dalenvance</td>
      <td>Ripper Dinksy</td>
      <td>1302</td>
      <td>X</td>
    </tr>
    <tr>
      <td><img class='art' src="placeholder/default.jpg" alt="album art"></td>
      <td>Dalenvance</td>
      <td>Ripper Dinksy</td>
      <td>1302</td>
      <td>X</td>
    </tr>
  </tbody>
</table>
    <script src="js/main.js"></script>
</body>
</html>