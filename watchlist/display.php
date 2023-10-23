<?php 
$allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
$result = mysqli_query($con, $allData);
$result_fetch = mysqli_fetch_assoc($result);
echo "woooooo";
// require('../main/connection.php');
// $allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
// $result = mysqli_query($con, $allData);
// $result_fetch = mysqli_fetch_assoc($result);
?>