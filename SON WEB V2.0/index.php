<?php
	require 'scripts/connect.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type= "text/css" href="styles/style"/>
        <link rel="shorcut icon" href="styles/img/logo.png" />
        <link rel="stylesheet" href="bs/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bs/css/bootstrap.min.css"/>
        <script defer src="bs/js/fontawesome-all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="bs/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">
		<title>SLU SON</title>
	</head>
    <!-- Script -->
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        if($_SESSION['type'] == 0) {
            header ("location: admin.php");
        } else {
            header ("location: faculty.php");
        }
    }
    if (isset($_POST['login'])) { //user logging in
        require 'scripts/signin.php';
    }
    ?>
	<body>
    <div class="py-5 cover">
        <div class="container">
            <div class="row">
            <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <div class="card text-white p-4 bg-light">
                        <div class="card-body">
                        <img class="img-fluid d-block mx-auto text-center" src="styles/img/logo.png" width="100" height="100">   
                <span class="">
                    <h3 class="text-center text-info">School of Nursing </h3>
                    <h4 class="mb-4 text-center text-info">Saint Louis University</h4>
                </span>   
                        <form action="index.php" method="post">
                            <div class="form-group"> <label class="text-info">Email</label>
                            <input type="email" class="form-control" placeholder="Enter your Email" name="user"> </div>
                            <div class="form-group"> <label class="text-info">Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="pass" name="pass"> </div>
                            <?php
                                if (isset($_SESSION['errorcode']) && $_SESSION['errorcode'] == 1) {
                                    echo $_SESSION['message'];
                                }
                            ?>
                            <button name="login" type="submit" class="btn btn-info w-100">Login</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
	</body>
</html>