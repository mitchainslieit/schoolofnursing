<?php
// Escape email to protect against SQL injections
$myemail = $mysqli->escape_string($_POST['old-email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$myemail'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else { // User exists
    $user = $result->fetch_assoc();
            $newemail = $mysqli->escape_string($_POST["new_email"]);
            $query = "UPDATE accounts SET email='$newemail' where email='$myemail'";
            if ($mysqli->query($query)) {
                echo "<script>alert('Email changed successfully!');</script>";
                echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
            } else {
                echo "<script>alert('Something went wrong!');</script>";
                echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
            }
        header("location: admin.php");
    
}
?>