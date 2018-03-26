<?php
    $facultyemail =  $mysqli->escape_string($_POST["facultyemail"]);
    $adminemail = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM accounts WHERE email='$facultyemail'") or die($mysqli->error());
    $admininfo = $mysqli->query("SELECT * FROM accounts WHERE email='$adminemail'") or die($mysqli->error());
    if ($facultyemail === $adminemail) {
        $_SESSION["message"] = "You can't remove yourself!";
        header("location: error.php");
    } else {
        if ( $result->num_rows == 0 ){ // User doesn't exist
            $_SESSION['message'] = "User with that email doesn't exist!";
            header("location: error.php");
        } else {
            $admin = $admininfo->fetch_assoc();
            if ( password_verify($_POST['password'], $admin['password']) ) {
                $sql = "DELETE FROM acc_data " . "where email='$facultyemail'";
                if ($mysqli->query($sql)) {
                    echo "<script>alert('Faculty Removed!');</script>";
                    echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
                } else {
                    $_SESSION["message"] = "Something went wrong!";
                    header("location: error.php");
                }
            } else {
                echo "<script>alert('You entered a wrong password!');</script>";
                echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
            }
        }
    }
?>