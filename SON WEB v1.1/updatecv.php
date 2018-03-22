<?php
/* Displays all error messages */
    session_start();
    require 'scripts/connect.php';
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['type'] == 0){
    } else {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/admin-style.css"/>
        <link rel="shorcut icon" href="styles/img/logo.png" />
        <link rel="stylesheet" href="bs/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bs/css/bootstrap.min.css"/>
        <script defer src="bs/js/fontawesome-all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="bs/js/bootstrap.min.js"></script>
        <script src="scripts/jss/sitescripts.js"></script>    
    </head>
<?php
    if (isset($_POST['upload'])) {
        $facultyemail =  $_SESSION['search_fact_email'];
        $adminemail = $_SESSION['email'];
        $facultyinfo = $mysqli->query("SELECT * FROM accounts WHERE email='$facultyemail'") or die($mysqli->error());
        $admininfo = $mysqli->query("SELECT * FROM accounts WHERE email='$adminemail'") or die($mysqli->error());
        $admin = $admininfo->fetch_assoc();
        $faculty = $facultyinfo->fetch_assoc();
        $folder_path = "cv/";
        $filename = "$facultyemail." . basename($_FILES["cvfile"]["name"]);
        $newname = $folder_path . $filename;
        $FileType = pathinfo($newname,PATHINFO_EXTENSION);
        if ( password_verify($_POST['password'], $admin['password']) ) {
            $query = "UPDATE acc_data SET acc_cv='$filename' where email='$facultyemail'";
            if ($FileType == "doc" || $FileType == "docx") {
                $filename = "$facultyemail." . 'doc';
                $newname = $folder_path . $filename;
                if (move_uploaded_file($_FILES["cvfile"]["tmp_name"], $newname)) {
                    if ($mysqli->query($query)) {
                        echo "<script>alert('Update Successful!');</script>";
                        echo "<script>setTimeout(\"location.href = 'admin.php';\",1500);</script>";
                    } else {
                        echo "<script>alert('Something went Wrong!');</script>";
                        echo "<script>setTimeout(\"location.href = 'updatecv.php';\",1500);</script>";
                    }
                } else {
                    echo "<script>alert('Upload Failed!');</script>";
                    echo "<script>setTimeout(\"location.href = 'updatecv.php';\",1500);</script>";
                }
            } else {
                    echo "<script>alert('Incorrect file format! Document files only!');</script>";
                    echo "<script>setTimeout(\"location.href = 'updatecv.php';\",1500);</script>";
            }
        } else {
            echo "<script>alert('Incorrect Admin Password!');</script>";
            echo "<script>setTimeout(\"location.href = 'updatecv.php';\",1500);</script>";
        }
    } 
?>
    <body>
        <div class="cover py-4" id="top-container">
            <div class="container">
                <div class="row">
                <div class="align-self-center col-md-6 text-white">                
                <h1 class="text-center text-md-left display-3 font-weight-bold">Guidelines</h1>
                <p class="lead text-dark">
                    1. Before uploading, check the file you'll upload again! <br>
                    2. The name of the file is ignored as long as it is a document file. <br>
                    3. The document file size must be 10 MB or less <br>
                    4. After meeting all the requirement check the box below.
                </p>
                </div>
                    <div class="col-md-6">
                        <div class="card bg-dark">
                            <div class="card-body p-5">
                                <?php
                                    $fact_name = $_SESSION['search_fact_name'];
                                    $fact_email = $_SESSION['search_fact_email'];
                                    echo "<h3 class='text-white'>Update $fact_name's CV</h3>";
                                    echo "<h6 class='pb-3 text-info'>Email: $fact_email</h6>";
                                ?>
                                <form action='updatecv.php' class="d-inline" method='post' name='CVReplace' id='CVReplace' enctype="multipart/form-data">
                                <div class="form-group"><label class="text-white">Curriculum Vitae <span class="text-warning">(Document files only!)</span></label>
                                    <input type="file" class="form-control" name="cvfile" required></div>
                                <div class="form-group"><label class="text-white">Admin's Password</label>
                                    <input type="password" class="form-control" placeholder="Please enter your password" name="password" required/></div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck1" oninvalid="this.setCustomValidity('Please be sure to read the guidelines first!')" oninput="setCustomValidity('')" value="checked" required/>
                                    <label class="form-check-label text-white" for="defaultCheck1">
                                        I have read the <span class="text-danger">guidelines</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn mt-2 btn-outline-light" name="upload">Upload</button>
                                <input type="button" value="Go Back!" class="btn mt-2 btn-outline-light" id="btnHome" onClick="document.location.href='admin.php'" />
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        </script>
    </body>
</html>