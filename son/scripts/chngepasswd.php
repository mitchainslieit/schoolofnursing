<?php
// Escape email to protect against SQL injections
$idno = $mysqli->escape_string($_POST['idno']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$idno'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['old_password'], $user['password']) ) {
        if ($_POST['new_password'] === $_POST['conf_password']) {
            $newpassword = $mysqli->escape_string(password_hash($_POST["new_password"], PASSWORD_BCRYPT));
            $query = "UPDATE accounts SET password='$newpassword' where email='$idno'";
            if ($mysqli->query($query)) {
                echo "<script>alert('Password changed successfully!');</script>";
                echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
            } else {
                echo "<script>alert('Something went wrong!');</script>";
                echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
            }
        } else {
            $_SESSION["message"] = "Your password doesn't match!";
            header("location: error.php");
        }
    } else {
        echo "<script>alert('You have entered a wrong password!');</script>";
        echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
    }
}
?>