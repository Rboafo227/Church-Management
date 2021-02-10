<?php

require_once("inc/functions.php");
require_once("inc/db-const.php");
require_once("inc/config1.php");
session_start();

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
}

if (isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($$_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: index.php');
        }
    }
}

?>

<div class="content h-100">
    <div class="row h-100">
        <div class="col-lg-12">
            <div class="login card auth-box mx-auto my-auto">
                <div class="card-block text-center">
                    <div class="user-icon">
                        <i class="fa fa-user-circle"></i>
                    </div>

                    <h4 class="text-light">Deliverance Church Forgot Password</h4>
                    <form role="form" method="post" onSubmit="return valid();" name="reset">
                        <div class="user-details">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user-o"></i>
                                    </span>
                                    <input class="form-control" type="email" name="email" autocomplete="off" placeholder="Current Password" required />
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

                        <button type="submit" name="change" class="btn btn-primary btn-lg btn-block">Reset Password</button>

                        <div class="user-links">
                            <a href="../members/index.php" class="pull-left">Home Page</a>
                            <a href="../login.php" class="pull-right">Admin Login</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>