<?php
    $facultyemail =  $mysqli->escape_string($_POST["idno"]);
    $adminemail = $_SESSION['email'];
    $facultyinfo = $mysqli->query("SELECT * FROM accounts WHERE email='$facultyemail'") or die($mysqli->error());
    $admininfo = $mysqli->query("SELECT * FROM accounts WHERE email='$adminemail'") or die($mysqli->error());
    $admin = $admininfo->fetch_assoc();
    $faculty = $facultyinfo->fetch_assoc();
    $folder_path = "cv/";
    $filename = "$facultyemail." . 'doc';
    $newname = $folder_path . $filename;
    $FileType = pathinfo($newname,PATHINFO_EXTENSION);
    if ( password_verify($_POST['password'], $admin['password']) ) {
        $query = "UPDATE acc_data SET acc_cv='$filename' where email='$facultyemail'";
        if ($FileType == "doc" || $FileType == "docx") {
            //unlink("$newname");
            if (move_uploaded_file($_FILES["cvfile"]["tmp_name"], $newname)) {
                if ($mysqli->query($query)) {
                    header ("location: admin.php");
                } else {
                    $_SESSION["message"] = "Something went wrong!";
                    header("location: error.php");
                }
            } else {
                $test = $_FILES["cvfile"]["error"];
                echo "$test";
            }
        } else {
                $_SESSION["message"] = "Incorrect file format! Documents files only";
                header("location: error.php");
        }
    } else {
        $_SESSION['message'] = $filename;
        header("location: error.php");
    } 
?>