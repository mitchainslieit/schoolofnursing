<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Failed!</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/error-style.css"/>
        <link rel="shorcut icon" href="../styles/img/logo.png" />
        <link rel="stylesheet" href="../bs/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../bs/css/bootstrap.min.css"/>
        <script defer src="../bs/js/fontawesome-all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="../bs/js/bootstrap.min.js"></script>
        <script src="../scripts/jss/sitescripts.js"></script>
</head>
<body>
    <div class="py-4 text-center cover" id="error-container">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-3 mb-4 text-dark">Error!</h1>
                    <?php 
                        if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ) {
                            $message = $_SESSION['message'];
                            echo "<h2 class='display-5 mb-4 text-info'>$message</h2>";
                        } else {
                            header("localtion: index.php");
                        }
                    ?>
                    <a href="index.php" class="btn btn-lg mx-1 btn-secondary">Go back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>