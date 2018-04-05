<?php
// Escape email to protect against SQL injections
$idno = $mysqli->escape_string($_POST['idno']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$idno'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['password'], $user['password']) ) {
        $newemail = $mysqli->escape_string($_POST["new_email"]);
        $query = "UPDATE acc_data SET email='$newemail' where email='$idno'";
        $_SESSION['email'] = $newemail;
        if ($mysqli->query($query)) {
            echo "<script>alert('Email changed successfully!');</script>";
            echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
        } else {
            echo "<script>alert('Something went wrong!');</script>";
            echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
        }
    } else {
        echo "<script>alert('You have entered a wrong password!');</script>";
        echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
    }
}
?>
