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
        $result = $mysqli->query("SELECT * FROM accounts") or die($mysqli->error());
        if (isset($_POST['submit'])) {
            require 'scripts/adminfunctions.php';  
        }
        if (isset($_POST['cp'])) {
            require 'scripts/chngepasswd.php';
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
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwd">Edit Profile</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwd">Change my Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Refresh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="scripts/logout.php">Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="py-5 text-center topsticky cover" id="top-container">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-2 mb-1 text-primary">School of Nursing</h1>
                        <h1 class="display-4 mb-1 text-primary">Saint Louis University</h1>
                        <?php
                            $name = $_SESSION['facultyname'];
                            echo "<p class='lead mb-3'>Hello <span class='text-primary display-5'>$name,</span> <br> Welcome to the Faculty's page! <br> <span class='display-4 text-danger' style='font-weight: 600;'>This webpage is still on maintenance</span></p>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body> 
</html>