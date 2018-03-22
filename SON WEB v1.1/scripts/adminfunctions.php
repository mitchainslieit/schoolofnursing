<?php
    //This are the variables for "Add a faculty" Function
    $facultyname =  $mysqli->escape_string($_POST["facultyname"]);
    $facultytype =  $mysqli->escape_string($_POST["type"]);
    $username = $mysqli->escape_string($_POST["idno"]);
    $password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));
    $result = $mysqli->query("SELECT * FROM accounts WHERE email='$username'") or die($mysqli->error());
    //This are the variables for "Uploading a file" Function
    $folder_path = "cv/";
    $filename = "$username." . 'doc';
    $newname = $folder_path . $filename;
    $FileType = pathinfo($newname,PATHINFO_EXTENSION);
    
    //This block of code are resposible for adding a new faculty
    
    if ( $result->num_rows > 0 ) {
        $_SESSION["message"] = "User with this email already exists!";
        header("location: error.php");
    } else {
        if ($_POST["password"] === $_POST["conf_password"]) {
            $sql = "insert into accounts (email, password, type) " . "VALUES ('$username', '$password', '$facultytype')";
            $filesql = "INSERT INTO acc_data (email, acc_name, acc_cv) " . "VALUES ('$username', '$facultyname', '$filename')";
            if ($FileType == "doc" || $FileType == "docx") {
                if (move_uploaded_file($_FILES["cvfile"]["tmp_name"], $newname)) {
                    if ($mysqli->query($filesql) && $mysqli->query($sql)) {
                        header ("location: admin.php");
                    } else {
                        $_SESSION["message"] = "Something went wrong!";
                        header("location: error.php");
                    }
                } else {
                    $_SESSION["message"] = "Upload Failed!";
                    header("location: error.php");
                }
            } else {
                $_SESSION["message"] = "Incorrect file format! Documents files only";
                header("location: error.php");
            }  
        } else {
            $_SESSION["message"] = "Passwords are not the same!";
            header("location: error.php");
        }      
    }
?>
