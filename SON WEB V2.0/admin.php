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
        <script src="bs/js/jquery-3.1.0.min.js"></script>
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
        if (isset($_POST['cpm'])) {
            require 'scripts/chngemypasswd.php';
        }
        if (isset($_POST['cmemail'])) {
            require 'scripts/changeemail.php';
        }
        if (isset($_POST['remove'])) {
            require 'scripts/removefact.php';
        }
        if (isset($_POST['go-update'])) {
            require 'scripts/update.php';
        }
        if (isset($_POST['change-email'])) {
            require 'scripts/changeemail.php';
        }
        if (isset($_GET['open-new'])) {
            $_SESSION['search_fact_email'] = $_GET['fact-email'];
            $_SESSION['search_fact_name'] = $_GET['fact-name'];
            header ("location: updatecv.php");
        }
        if (isset($_GET['gosearch'])) {
            require 'scripts/search.php';
            echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#search-result').modal('show');
                });
            </script>";
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Faculty</a>
                        <div class="dropdown-menu m-2 " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#newfact">Add a Faculty</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#remfact">Remove a Faculty</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwd">Reset Faculty's Password</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                        <div class="dropdown-menu m-2 " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myemail">Change my Email</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mypasswd">Change my Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">Contact Us</a>
                    </li>
                </ul>
                <a class="btn btn-primary form-inline ml-auto" href="scripts/logout.php">Logout</a>
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
                            echo "<p class='lead mb-2'>Hello <span class='text-primary display-5'>$name,</span> <br> Welcome to the Administator's page!</p>";
                        ?>
                        <form id="search" method="get" action="admin.php">
                            <p class="display-4">Search the database</p>
                            <input type="text" name="search-value" placeholder="Search for a faculty" class="search-bar" />
                            <input type="submit" style="display: none;" name="gosearch"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading mb-3">
						<h3 class="panel-title">Database
                            <span id="h3-sub">
                                (<i class="fas fa-download"></i> - Download&emsp;
                                <i class="fas fa-edit"></i> - Update&emsp;
                                <i class="fas fa-eye"></i> - View & Print)
                            </span>
                        </h3>
					</div>
					<div class="panel-body mb-3">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search for the Name" />
					</div>
					<table class="table table-hover text-center table-responsive adjustw" id="dev-table">
						<thead>
							<tr>
								<th class="w-50">Name</th>
                                <th class="">Email</th>
                                <th class="w-50"></th>
							</tr>
						</thead>
                        <?php
                            $result = $mysqli->query("select * from acc_data natural join accounts order by acc_name") or die($mysqli->error());
                            $counter = 0;
                            while($row = mysqli_fetch_array($result)) {
                                echo '<tbody>';
                                echo "<td>$row[acc_name]</td>";
                                echo "<td>$row[email]</td>";
                                echo "<td><form action='scripts/download.php' class='d-inline' method='post' name='download' id='download-link'>
                                            <input name='file_name' value='$row[email].doc' type='hidden'>
                                            <button class='btn btn-dark my-2' type='submit' name='gosearch'><i class='fas fa-download'></i></button>
                                        </form>
                                        <form action='admin.php' class='d-inline' method='get'> 
                                            <input name='fact-email' value='$row[email]' type='hidden'>
                                            <input name='fact-name' value='$row[acc_name]' type='hidden'>
                                            <button class='btn btn-dark' type='submit' name='open-new'><i class='fas fa-edit'></i></button>
                                        </form>
                                        <form class='d-inline' method='post' action='cv/converter.php'>
                                            <input name='file_name' value='$row[email]' type='hidden'>
                                            <button class='btn btn-dark my-2' type='submit'><i class='fas fa-eye'></i></button>
                                        </form>
                                    </td>";
                                echo '</tbody>';
                                $counter++;
                            }
                        ?>
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="bg-dark text-white" id="contactus">
        <div class="container">
            <div class="row">
                <div class="p-4 col-md-4">
                    <h2 class="mb-4 text-secondary">SCIS</h2>
                    <p class="text-white">Incase of any errors Just contact us. We provided our contact information, just email or call us! </p>
                </div>
                <div class="p-4 col-md-4">
                    <h2 class="mb-4 text-secondary">Mapsite</h2>
                    <ul class="list-unstyled">
                    <a href="#" class="text-white">Home</a>
                    <br>
                    <a href="#" class="text-white">Show Profile</a>
                    <br>
                    <a href="#" class="text-white">Edit Profile</a>
                    <br>
                    <a href="#" class="text-white">Add a Faculty</a>
                    </ul>
                </div>
                <div class="p-4 col-md-4">
                    <h2 class="mb-4">Contact Us!</h2>
                    <p>
                    <a href="tel: +63 906 792 2016" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 906 792 2016 ~ Mitch</a>
                    </p>
                    <p>
                    <a href="mailto:2162752@slu.edu.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fas fa-envelope"></i>2162752@slu.edu.ph</a>
                    </p>
                    <p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center text-white">© DJMN 2018 SCIS - All rights reserved. </p>
                </div>
            </div>
        </div>
    </div>
<!------------------------------------------------MODALS------------------------------------------------>
    <div id="newfact" class="modal fade py-5" role="newfaculty">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Add a faculty</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">Faculty Name</label>
                            <input type="text" class="form-control" placeholder="Enter his/her name" name="facultyname" size="100" required></div>
                            <div class="form-group"><label class="text-white">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="idno" required></div>
                            <div class="form-group"><label class="text-white">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required></div>
                            <div class="form-group"><label class="text-white">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="conf_password" required></div>
                            <div class="form-group"><label class="text-white">Employee Type</label>&emsp;&emsp;
                                <select name="type" class="bg-light btn">
                                    <option value="0">Admin</option>
                                    <option value="1">Faculty</option>
                                </select> 
                            </div>
                            <div class="form-group"><label class="text-white">Curriculum Vitae <span class="text-warning">(Document files only!)</span></label>
                            <input type="file" class="form-control" name="cvfile" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="remfact" class="modal fade py-5" role="removal">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Remove a faculty</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">Faculty Email</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="facultyemail" required></div>
                            <div class="form-group"><label class="text-white">Admin's Password</label>
                            <input type="password" class="form-control" placeholder="Please enter your password" name="password" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="remove">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <div id="passwd" class="modal fade py-5" role="newpassword">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Reset Faculty's Password</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">Email</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="idno" required></div>
                            <div class="form-group"><label class="text-white">Enter the new password</label>
                            <input type="password" class="form-control" placeholder="New Password" name="new_password" required></div>
                            <div class="form-group"><label class="text-white">Confirm new password</label>
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
    <div id="mypasswd" class="modal fade py-5" role="mynewpassword">
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
                            <div class="form-group"><label class="text-white">Old Password</label>
                            <input type="password" class="form-control" placeholder="Enter your old password" name="old_password" required></div>
                            <div class="form-group"><label class="text-white">Enter your new password</label>
                            <input type="password" class="form-control" placeholder="New Password" name="new_password" required></div>
                            <div class="form-group"><label class="text-white">Confirm your password</label>
                            <input type="password" class="form-control" placeholder="Confirm new password" name="conf_password" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="cpm">Submit</button>
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
    <div id="editprofile" class="modal fade py-5" role="edit-my-profile">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Add a faculty</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">Faculty Name</label>
                            <input type="text" class="form-control" placeholder="Enter his/her name" name="facultyname" size="100" required></div>
                            <div class="form-group"><label class="text-white">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="idno" required></div>
                            <div class="form-group"><label class="text-white">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required></div>
                            <div class="form-group"><label class="text-white">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="conf_password" required></div>
                            <div class="form-group"><label class="text-white">Employee Type</label>&emsp;&emsp;
                                <select name="type" class="bg-light btn">
                                    <option value="0">Admin</option>
                                    <option value="1">Faculty</option>
                                </select> 
                            </div>
                            <div class="form-group"><label class="text-white">Curriculum Vitae <span class="text-warning">(Document files only!)</span></label>
                            <input type="file" class="form-control" name="cvfile" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal py-5 my-5" id="search-result">
        <div class="modal-dialog" role="message" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $_SESSION['search_fact_name'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body text-center">
                    <div class="btn-group">
                    <span id="h1-sub">
                        <form action='scripts/download.php' class="d-inline" method='post' name='download' id='download-link'>
                            <?php 
                                $fact_email = $_SESSION['search_fact_email'];
                                echo "<input name='file_name' value='$fact_email.doc' type='hidden'>";
                            ?>
                            <button class='btn btn-dark' type='submit' name='gosearch'><i class='fas fa-download'></i></button>
                        </form>
                        <form action='updatecv.php' class="d-inline" method=''>
                                <?php 
                                    $fact_email = $_SESSION['search_fact_email'];
                                    $fact_name = $_SESSION['search_fact_name'];
                                    echo "<input name='fact_email' value='$fact_email' type='hidden'>";
                                    echo "<input name='fact_name' value='$fact_name' type='hidden'>"
                                ?>
                            <button class='btn btn-dark' type='submit' name=''><i class='fas fa-edit'></i></button>
                        </form>
                        <form class='d-inline' method='post' action='cv/converter.php'>
                                <?php 
                                    $fact_email = $_SESSION['search_fact_email'];
                                    echo "<input name='file_name' value='$fact_email' type='hidden'>";
                                ?>
                                <button class='btn btn-dark my-2' type='submit'><i class='fas fa-eye'></i></button>
                        </form>
                    </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="h3-sub">
                        (<i class="fas fa-download"></i> - Download&emsp;
                        <i class="fas fa-edit"></i> - Update&emsp;
                        <i class="fas fa-eye"></i> - View & Print)
                    </span>
                </div>
            </div>
        </div>
        </div>
        <script>
        jQuery(document).ready(function( $ ) {   
            $(".close").click(function(){
                window.location.replace("/admin.php");
            });
            
              $("#search-result").click(function(){
                window.location.replace("/admin.php");
            });
        });
        </script>   
    </body> 
</html>