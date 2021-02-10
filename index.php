<?php include("inc/header.php");
include("inc/topnav.php");
//include("inc/general-sidebar.php");

$pagetitle = "Deliverance Church  | Home";
?>
<?php include("inc/functions.php"); ?>
<?php include("inc/config.php"); ?>
<?php include("inc/db-const.php"); ?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'https://dailyverses.net/get/verse?language=niv&isdirect=1&url=' + window.location.hostname,
            dataType: 'JSONP',
            success: function(json) {
                $(".dailyVersesWrapper").prepend(json.html);
            }
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- PAGE CONTENT -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body style="background: url('images/cross.jpg')">
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title" style="color: white;"><?php echo $pagetitle; ?></h4>
                    <p>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="alert alert-info">
                                    Welcome to our Church Management Information System code named: <strong>Deliverance Church</strong>. Get your account from your Pastor!
                                    <a href="#" data-dismiss="alert" class="close">×</a>
                                </div>

                            </div>
                        </div>
                    </p>
                </div>
            </div>
            <div style="padding-top: 50px; height: 450px;">
                <?php include("slider.html") ?>
            </div>

            <div class=" row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-block">
                            <h5 class="text-bold card-title">Church Branches Directory</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th>Location</th>
                                        <th>Address</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                                    $table = mysqli_query($conn, 'SELECT * FROM entities ORDER BY name ASC');
                                    while ($row = mysqli_fetch_array($table))

                                    ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                    //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                    {; ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['cell']; ?></td>

                                        </tr>


                                    <?php }
                                    echo "</table>"; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-block">
                            <h5 class="text-bold card-title">Church Events</h5>
                            <table class="table table-inverse">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Venue</th>
                                        <th>Date</th>
                                        <th>RSVP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                                    $table = mysqli_query($conn, 'SELECT * FROM events ORDER BY date ASC');
                                    while ($row = mysqli_fetch_array($table))

                                    ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                    //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                    {; ?>
                                        <tr>
                                            <td><?php echo $row['event']; ?></td>
                                            <td><?php echo $row['venue']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['rsvp']; ?></td>

                                        </tr>

                                    <?php }
                                    echo "</table>"; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <h5 class="text-bold card-title">Church Sermons</h5>
                            <table class="table table-inverse">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Topic</th>
                                        <th>Verses</th>
                                        <th> View </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                                    $table = mysqli_query($conn, 'SELECT * FROM sermons ORDER BY date ASC');
                                    while ($row = mysqli_fetch_assoc($table))

                                    ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                    //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $id = $row['id'];
                                        $sermon = $row['sermon']; ?>
                                        <tr>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['topic']; ?></td>
                                            <td><?php echo $row['verse']; ?></td>
                                            <td><?php echo "<a href='sermon-detail.php?sermonid=$id' > View</a>"; ?></td>
                                        </tr> <?php }
                                            echo "</table>"; ?> </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <footer class="col-lg-12">
                    <center>
                        <div>
                            <br><a href="https://www.facebook.com/profile.php?id=100012534422372&lst=100003215180482%3A100012534422372%3A1583565934&sk=about" target='_blank' <span i class="fa fa-facebook" style="text-align: center;"> - Deliverance Church Int'l Kabati</a>
                            &nbsp &nbsp &nbsp &nbsp<a href="mailto:deliverancechurchkabatikitui@gmail.com?" target='_blank' <span i class=" fa fa-envelope" style="text-align: center;"> </span> - deliverancechurchkabatikitui@gmail.com</a> <br> <br>
                            <p>&copy;<?php echo date("Y"); ?> Deliverance Church- Kabati</span>
                            </p>

                        </div>
                    </center>
                </footer>


                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script>
                    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
                </script>
                <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

                <script src="js/general.js" type="text/javascript"></script>
                <script src="js/bootstrap.js" type="text/javascript"></script>
                <script src="js/jquery.waypoints.min.js" type="text/javascript"></script>
                <script src="js/waypoints.js" type="text/javascript"></script>
</body>


</html>