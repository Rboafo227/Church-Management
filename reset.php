<?php

$conn = mysqli_connect('localhost', 'root', '', 'project');
if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);
    $query = "SELECT * FROM password_reset WHERE token='$token'";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $token = $row['token'];
        $email = $row['email'];
    } else {
        header("location:members/login.php");
    }
}

if (isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    if ($password != $confirmpassword) {
        echo "<div class='alert alert-danger'> Passwords Do Not Match</div>";
    } else {
        $query = "UPDATE members set password='$password' WHERE email='$email'";
        mysqli_query($conn, $query);
        $query = "DELETE FROM password_reset WHERE email='$email'";
        mysqli_query($conn, $query);
        echo "<div class='alert alert-success'> Passwords Changed Successfully</div>";
    }
}

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


</head>






<div class="content h-100">
    <div class="row h-100">
        <div class="col-lg-12">
            <div class="login card auth-box mx-auto my-auto">
                <div class="card-block text-center">
                    <div class="user-icon">
                        <i class="fa fa-user-circle"></i>
                    </div>

                    <h4 class="text-light">Deliverance Church Reset Password</h4>
                    <form action="" method="post">
                        <div class="user-details">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user-o"></i>
                                    </span>
                                    <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" autocomplete="off" placeholder="Email" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" name="password" autocomplete="off" placeholder="New Password" required />
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

                        <button name="submit" class="btn btn-primary btn-lg btn-block">Change Password</button>

                        <div class="user-links">
                            <a href="../members/index.php" class="pull-left">Home Page</a>
                            <a href="../members/login.php" class="pull-right">Login</a>
                        </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE CONTENT -->
</div>
</body>

</html>