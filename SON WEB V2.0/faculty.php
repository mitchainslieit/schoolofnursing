<?php
/* Displays all error messages */
    session_start();
    require 'scripts/connect.php';
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['type'] == 1){
    } else {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/faculty-style.css"/>
        <link rel="shorcut icon" href="styles/img/logo.png" />
        <link rel="stylesheet" href="bs/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bs/css/bootstrap.min.css"/>
        <script defer src="bs/js/fontawesome-all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="bs/js/bootstrap.min.js"></script>
        <script src="scripts/jss/sitescripts.js"></script>
    </head>
    <?php
        if (isset($_POST['cp'])) {
            require 'scripts/chngepasswd.php';
        }
        if (isset($_POST['cmemail'])) {
            require 'scripts/changeemail.php';
        }
    ?>
    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="logo/logo_son.png" id="son-logo">SON</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav mx-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                        <div class="dropdown-menu m-2 " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myemail">Change Email</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mypasswd">Change my Password</a>
                        </div>
                    </li>
                </ul>
                <a class="btn btn-primary form-inline ml-auto" href="scripts/logout.php">Logout</a>
                </div>
            </div>
        </nav>
        <div class="py-5 text-center cover" id="top-container">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-2 mb-1 text-primary">School of Nursing</h1>
                        <h1 class="display-4 mb-1 text-primary">Saint Louis University</h1>
                        <?php
                        $name = $_SESSION['facultyname'];
                        echo "<p class='lead mb-5'>Hello <span class='text-primary display-5'>$name,</span> <br> Welcome to the Administator's page!</p>";
                        ?>
                        <form action='scripts/download.php' class="d-inline" method='post' name='download' id='download-link'>
                            <?php 
                            $fact_email = $_SESSION['email'];
                            echo "<input name='file_name' value='$fact_email.doc' type='hidden'>";
                            ?>
                            <button class='btn btn-dark' type='submit' name='gosearch'>Download My CV</button>
                        </form>
                        <form action='updatecv.php' class="d-inline" method=''>
                            <?php 
                            $fact_email = $_SESSION['email'];
                            $fact_name = $_SESSION['facultyname'];
                            echo "<input name='fact_email' value='$fact_email' type='hidden'>";
                            echo "<input name='fact_name' value='$fact_name' type='hidden'>"
                            ?>
                            <button class='btn btn-dark' type='submit' name=''>Send my CV</button>
                        </form>
                        <form class='d-inline' method='post' action='cv/converter.php'>
                            <?php 
                            $fact_email = $_SESSION['email'];
                            echo "<input name='file_name' value='$fact_email' type='hidden'>";
                            ?>
                            <button class='btn btn-dark my-2' type='submit'>View my CV</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------- MODAL --------------------------------------->
        <div id="mypasswd" class="modal fade py-5" role="mynewpassword">
            <div class="modal-dialog">
                <div class="modal-content add-faculty bg-dark">
                    <form class="" method="post" action="faculty.php" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title text-white">Reset My Password</h4>
                            <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <?php 
                                    $fact_email = $_SESSION['email'];
                                    echo "<input name='idno' value='$fact_email' type='hidden'>";
                                ?>
                                <div class="form-group"><label class="text-white">Old Password</label>
                                <input type="password" class="form-control" placeholder="Enter your old password" name="old_password" required></div>
                                <div class="form-group"><label class="text-white">Enter your new password</label>
                                <input type="password" class="form-control" placeholder="New Password" name="new_password" required></div>
                                <div class="form-group"><label class="text-white">Confirm your password</label>
                                <input type="password" class="form-control" placeholder="Confirm new password" name="conf_password" required></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="cp">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="myemail" class="modal fade py-5" role="mynewpassword">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Reset My Password</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <?php 
                                $fact_email = $_SESSION['email'];
                                echo "<input name='idno' value='$fact_email' type='hidden'>";
                            ?>
                            <div class="form-group"><label class="text-white">Enter your new Email</label>
                            <input type="email" class="form-control" placeholder="New Emails" name="new_email" required></div>
                            <div class="form-group"><label class="text-white">Your Password</label>
                            <input type="password" class="form-control" placeholder="Your Password" name="password" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="cmemail">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body> 
</html>