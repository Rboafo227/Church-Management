<?php

$conn = mysqli_connect('localhost', 'root', '', 'project');

if (isset($_POST['reset'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $query = "SELECT * FROM members where email = '$email'";
    $run = mysqli_query($conn, $query);

    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $db_id = $row['id'];
        $token = uniqid(md5(time()));
        $query = "INSERT INTO password_reset(id, email, token) VALUES(NULL, '$email', '$token')";

        if (mysqli_query($conn, $query)) {
            $to = $db_email;
            $subject = "Password Reset Link";
            $message = "token = $token";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers = "Content-type:text/html;charset=UTF-80" . "\r\n";
            $headers = 'From: <billydano360@gmail.com>' . "\r\n";
            //mail($to, $subject, $message, $headers);
            echo  "<div class='alert alert-success'> Password Reset Sent</div>";
        }
    } else {
        echo "<div class='alert alert-danger'> User Not Found</div>";
    }
}


?>
<?php

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

<body>

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
                                        <input class="form-control" type="email" name="email" autocomplete="off" placeholder="Email" required />
                                    </div>
                                </div>

                            </div>

                            <button type="submit" name="reset" class="btn btn-primary btn-lg btn-block">Reset Password</button>



                    </div>
                </div>
            </div>
        </div>
    </div>