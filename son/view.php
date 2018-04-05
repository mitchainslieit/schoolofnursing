<?php
/* Displays all error messages */
    session_start();
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
        <style>
            html {
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div class="bg-dark p-2 text-center">
            <a class="btn btn-primary form-inline ml-auto" href="admin.php">Go Back</a>            
        </div>
        <?php
            $text = $_SESSION['toviewemail'];
            echo "<iframe src='cv/pdf/$text.pdf' width='100%' height='100%' style='border: none; overflow: hidden;'></iframe>"    
        ?>        
    </body>
</html>