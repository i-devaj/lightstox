<?php
session_start();
require('../main/connection.php');
// stock name and username
// $_SESSION['loggedIn'] = "1";
// $_SESSION['stock_index'] = "0";
// print_r($_SESSION);
if ($_SESSION['loggedIn'] == "1") {
    $_SESSION['stock_index'] = 1;
    $_SESSION['loggedIn'] = "2";
}
if (isset($_POST['stockname'])) {
    if (isset($_SESSION['username'])) {
        // echo "<script>alert($_SESSION[stock_index])</script>";
        $stock_index = "stock" . $_SESSION['stock_index'];
        $allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
        $result = mysqli_query($con, $allData);
        $result_fetch = mysqli_fetch_assoc($result);
        $a = 0;
        foreach ($result_fetch as $key => $value) {
            if ($value == $_POST['stockname']) {
                echo "<script>alert('already added')
                window.location.href='../index.php';
                </script>";
                $a = 1;
            }
        }
        if ($a == 0) {
            if ($_SESSION['stock_index'] < 11) {
                $query = "UPDATE `watchlist` SET `$stock_index`='$_POST[stockname]' WHERE `username`='$_SESSION[username]'";
            } else {
                echo "<script>alert('full...')
            window.location.href='../index.php';
            </script>";
            }
            $stockName = $_POST['stockname'];    // stock name
            if (mysqli_query($con, $query)) {
                echo "<script>alert('saved!')
            window.location.href='../index.php';
            </script>";
                $_SESSION['stock_index'] = $_SESSION['stock_index'] + 1;
            } else {
                echo "<script>alert('unsuccessful')
                    window.location.href='../index.php';
                </script>";
            }
        }else{
            echo "hello";
            echo "<script>alert('already added..')
                window.location.href='../index.php';
                </script>";
        }
    }
}
