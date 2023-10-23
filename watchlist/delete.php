<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    require('../main/connection.php');
    $allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
    $result = mysqli_query($con, $allData);
    $result_fetch = mysqli_fetch_assoc($result);
    // $count = 0;
    foreach ($result_fetch  as $key => $value) {
        if ($_POST['delete_stock'] == $value) {
            $delete_query = "UPDATE `watchlist` SET `$key`=null WHERE `username`='$_SESSION[username]'";
            $execute = mysqli_query($con, $delete_query);
            $_SESSION['stock_index'] = $_SESSION['stock_index'] - 1;
            echo "<script>alert('Deleted')</script>";
            echo '<script>window.history.back();</script>';
            break;
        }
    }
    $allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
    $result = mysqli_query($con, $allData);
    $result_fetch = mysqli_fetch_assoc($result);
    $result_fetch = array_values(array_filter($result_fetch));
    unset($result_fetch[0]);
    $index = "stock" . $_SESSION['stock_index'];
    // print($_SESSION['stock_index']);

    $sql = "UPDATE watchlist SET ";
    for ($i = 1; $i < count($result_fetch) + 1; $i++) {
        $sql .= "stock" . $i . "='" . $result_fetch[$i] . "', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE `username`='$_SESSION[username]'";

    $delete_query = "UPDATE `watchlist` SET `$index`=null WHERE `username`='$_SESSION[username]'";
    if (mysqli_query($con, $delete_query)) {
    } else {
        echo "Error: " . mysqli_error($con);
    }


    

    // Execute the SQL query
    if (mysqli_query($con, $sql)) {
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
