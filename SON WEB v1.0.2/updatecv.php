<?php
/* Displays all error messages */
    session_start();
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
        if (isset($_POST['update'])) {
            require 'scripts/update.php';
        }
    ?>
    <body>
        <div class="cover py-4" id="top-container">
            <div class="container">
                <div class="row">
                <div class="align-self-center col-md-6 text-white">                
                <h1 class="text-center text-md-left display-3 font-weight-bold">Guidelines</h1>
                <p class="lead text-dark">
                    1. Just Guideline of a guideline <br>
                    2. Just Guideline of a guideline <br>
                    3. Just Guideline of a guideline <br>
                    4. Just Guideline of a guideline <br>
                    5. Just Guideline of a guideline <br>
                    6. Just Guideline of a guideline <br>
                    7. Just Guideline of a guideline <br>
                    8. Just Guideline of a guideline <br>
                </p>
                </div>
                    <div class="col-md-6">
                        <div class="card bg-dark">
                            <div class="card-body p-5">
                                <?php
                                    $fact_name = $_POST["factname"];
                                    $fact_email = $_POST["email"];
                                    echo "<h3 class='text-white'>Update $fact_name's CV</h3>";
                                    echo "<h6 class='pb-3 text-info'>Email: $fact_email</h6>";
                                ?>
                                <form action='updatecv.php' class="d-inline" method='post' name='CVReplace' id='CVReplace'>
                                <?php 
                                    $fact_email = $_POST["email"];
                                    echo "<input name='idno' value='$fact_email' type='hidden'/>";
                                ?>
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
                                <button type="submit" class="btn mt-2 btn-outline-light" name="update">Upload</button>
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