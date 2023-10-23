<?php
require('../main/connection.php');
if (isset($_POST['submit'])) {
    if (!($_POST['email'] == "" || $_POST['message'] == "")) {
        $user_exit_query = "SELECT * FROM `feedback` WHERE `email`='$_POST[email]'";
        $result = mysqli_query($con, $user_exit_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['email'] == $_POST['email']) {
                    echo "
                        <script>
                            alert('Email is already in database....');
                            window.location.href='./';
                        </script>
                    ";
                }
            } else {
                $query = "INSERT INTO `feedback`(`email`, `feedback`) VALUES ('$_POST[email]','$_POST[message]')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo "
                    <script>
                        alert('Feedback has been send.....');
                        window.location.href='./';
                    </script>
                ";
                } else {
                    echo "
                    <script>
                        alert('Something went wrong....');
                        window.location.href='./';
                    </script>
                ";
                }
            }
        }
    }else{
        echo "
        <script>
            alert('Please fill the details...');
            window.location.href='./';
        </script>
    ";
    }
} else {
    echo "
        <script>
            alert('Cannot Run Query....');
            window.location.href='./';
        </script>
    ";
}
