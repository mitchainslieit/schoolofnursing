<?php
// Escape email to protect against SQL injections
$value = $mysqli->escape_string($_GET['search-value']);
$result = $mysqli->query("SELECT * FROM accounts NATURAL JOIN acc_data WHERE acc_name='$value'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "That faculty is not yet registered!";
    header("location: error.php");
} else { // User exists
    $user = $result->fetch_assoc();
    $_SESSION['search_fact_name'] = $user['acc_name'];
    $_SESSION['search_fact_email'] = $user['email'];
}
?>