<?php
require './submit.php';
require './main/connection.php';
$allData = "SELECT * FROM `emails` WHERE `email`='$_GET[email]'";
$result = mysqli_query($con, $allData);
$result_fetch = mysqli_fetch_assoc($result);
// var_dump(mysqli_num_rows($result));
if (mysqli_num_rows($result) == 1) {
    // echo 'hi';
    $delete_query = "DELETE FROM `emails` WHERE `email`='$_GET[email]'";
    $execute = mysqli_query($con, $delete_query);
    if ($execute) {
        echo "<script>
        alert('Unsubscribed from this newsletter! ');
        // window.location.href('https://lightstox.tech/index.php');
        window.location.href= './index.php';
        </script>";
    }
} else {
    echo "
    <script>
        window.location.href= './index.php';
    </script>
    ";
    // echo "
    //  <script>
    //   alert('Not working');
    //  </script>
    //  ";
}
