<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$idno = $mysqli->escape_string($_POST['user']);
$result = $mysqli->query("SELECT * FROM accounts NATURAL JOIN acc_data WHERE email='$idno'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['pass'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
		$_SESSION['type'] = $user['type'];
        $_SESSION['facultyname'] = $user['acc_name'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
		if ( $_SESSION['type'] == 0 ) {
            $_SESSION['type'] = 0;
			header("location: admin.php");
            exit();
		} else {
            $_SESSION['type'] = 1;
		    header("location: faculty.php");
            exit();
		}
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header ("location: error.php");
    }
}
?>