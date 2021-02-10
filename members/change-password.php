<?php
session_start();
require_once("inc/functions.php");
require_once("inc/db-const.php");
require_once("inc/config1.php");
include('inc/config.php');
include("inc/header.php");
include("inc/topnav.php");
error_reporting(0);

if (isset($_POST['change'])) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $username = $_SESSION['login'];

    $sql = "SELECT * FROM members WHERE username LIKE {'$username'} and password LIKE {'$password'}";
    $query = $conn->prepare($sql);;
    $query->execute();

    if ($query->num_rows > 0) {
        $con = "update members set password='$newpassword' where username='$username'";
        $chngpwd1 = $dbh->prepare($con);

        $chngpwd1->execute();
        $msg = "Your Password succesfully changed";
    } else {
        $error = "Your current password is wrong";
    }
}


session_start();


$pagetitle = "Deliverance Church "; ?>
<html>

<head>
    <title><?php echo $pagetitle; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/styles.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.css">

    <script type="text/javascript" src="lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/tether.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/app.min.js"></script>

    <script type="text/javascript" src="assets/js/sweetalert2.all.js"></script>

    <script>
        function showPassword() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>






<div class="content h-100">
    <div class="row h-100">
        <div class="col-lg-12">
            <div class="login card auth-box mx-auto my-auto">
                <div class="card-block text-center">
                    <div class="user-icon">
                        <i class="fa fa-user-circle"></i>
                    </div>

                    <h4 class="text-light">Deliverance Church Change Password</h4>
                    <form role="form" method="post" onSubmit="return valid();" name="chngpwd">
                        <div class="user-details">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user-o"></i>
                                    </span>
                                    <input class="form-control" type="password" name="password" autocomplete="off" placeholder="Current Password" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" name="newpassword" autocomplete="off" placeholder="New Password" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" placeholder="Confirm New Password" required />
                                </div>
                            </div>

                        </div>

                        <button type="submit" name="change" class="btn btn-primary btn-lg btn-block">Change Password</button>

                        <div class="user-links">
                            <a href="../members/index.php" class="pull-left">Home Page</a>
                            <a href="../login.php" class="pull-right">Admin Login</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE CONTENT -->
</div>
</body>

</html>