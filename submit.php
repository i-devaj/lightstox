<?php
require('main/connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'main/function/phpmailer/src/PHPMailer.php';
require 'main/function/phpmailer/src/SMTP.php';
require 'main/function/phpmailer/src/Exception.php';

if (isset($_POST['subscribe'])) {

    $already = "SELECT `email` FROM `emails` WHERE `email`='$_POST[email]'";
    $found = mysqli_query($con, $already);
    if ($found) {
        if (mysqli_num_rows($found) != 1) {
            $query = "INSERT INTO `emails`(`email`) VALUES ('$_POST[email]')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "
                <script>
                 //   alert('Subscribed successfully...');
                    window.history.back();
                </script>
                ";


                 $email = $_POST['email'];

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtppro.zoho.in";
                $mail->SMTPAuth = true;
                $mail->Username = "lightnews@lightstox.tech";
                $mail->Password = "G0theKhajav";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;

                $mail->setFrom('lightnews@lightstox.tech', 'Lightnews');
                $mail->addAddress($email);
                // $mail->addAddress('himajpatil@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = "Weekly newsletter";
                $email_template = './email_temple/news.html';
                
                $msg = file_get_contents($email_template);
                $msg = str_replace('%email%', $email, $msg);
                $mail->Body    = $msg;

                $mail->send();
                // echo '<script>window.history.back();</script>';
            } else {
                echo "
                <script>
                    //alert('Subscribed unsuccessfully...');
                    window.history.back();
                </script>
                ";
            }
        } 
        else {
            echo "<script>
            // alert('Email already subscribed...');
            window.history.back();
        </script>";
        }
    }
}
