<?php
require_once("inc/functions.php");
require_once("inc/db-const.php");
require_once("inc/config1.php");
session_start();
if (logged_in() == true) {
    redirect_to("profile.php");
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

    <script type="text/javascript" src="lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/tether.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/app.min.js"></script>

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

<body style="background: url('images/cross.jpg')">
    <div class="page-container">
        <!-- PAGE CONTENT -->
        <div class="content h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="login card auth-box mx-auto my-auto">
                        <div class="card-block text-center">
                            <div class="user-icon">
                                <i class="fa fa-user-circle"></i>
                            </div>

                            <h4 class="text-light">Deliverance Church Member Portal Login</h4>
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <div class="user-details">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-user-o"></i>
                                            </span>
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" id="myInput" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" onclick="showPassword()"> &nbsp Show Password
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                                <div class="user-links">
                                    <a href="../index.php" class="pull-left">Home Page</a>
                                    <a href="../forgot-password.php" class="pull-right">Forgot Password</a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /PAGE CONTENT -->
    </div>
</body>

</html><?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // processing remember me option and setting cookie with long expiry date
            if (isset($_POST['remember'])) {
                session_set_cookie_params('604800'); //one week (value in seconds)
                session_regenerate_id(true);
            }

            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            # check connection
            if ($mysqli->connect_errno) {
                echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
                exit();
            }

            $sql = "SELECT * from members WHERE username LIKE '{$username}' AND password LIKE '{$password}'";
            $result = $mysqli->query($sql);

            if ($result->num_rows != 1) {
                echo "<p><b>Error:</b> Invalid username/password combination</p>";
            } else {
                // Authenticated, set session variables
                $user = $result->fetch_array();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                redirect_to("index.php");
                // do stuffs
            }
        }

        if (isset($_GET['msg'])) {
            echo "<p style='color:red;'>" . $_GET['msg'] . "</p>";
        }

        ?>