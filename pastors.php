<!DOCTYPE HTML>
<html>


<head>
    <title>Deliverance Church | Pastors <?php $title ?></title>
    <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
    <?php
    include("inc/topnav.php");
    include("inc/sidebar.php");

    ?>
    <?php include("inc/functions.php"); ?>
    <?php include("inc/config.php"); ?>
    <?php include("inc/db-const.php"); ?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/styles.min.css">
    <link rel="stylesheet" href="lib/css/chartist.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.css">




    <script type="text/javascript" src="lib/js/jquery.min.js">
    </script>
    <script type="text/javascript" src="lib/js/tether.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="lib/js/chartist.min.js"></script>
    <script type="text/javascript" src="assets/js/app.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.all.js"></script>

    <link rel="stylesheet" href="assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/DataTables/buttons.dataTables.min.css">



    <script src="assets/DataTables/datatables.min.js"> </script>

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"> </script>



    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"> </script>

    <script>
        $(function() {
            // Dashboard Sales Chart
            // ------------------------------------------------------------------

            var dataMain = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [
                    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                ]
            };

            var optionsMain = {
                seriesBarDistance: 10
            };

            var responsiveOptionsMain = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];
            var chart = new Chartist.Bar('.ct-chart-dashboard', dataMain, optionsMain, responsiveOptionsMain);
        });
    </script>
</head>





<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="card-title">Pastors Directory</h4>
                <p>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-success">
                                <strong>Verse of the Day!</strong>: But blessed are your eyes, for they see: and your ears, for they hear.- Matt: 13:16
                                <a href="#" data-dismiss="alert" class="close">×</a>
                            </div>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h6 class="card-title text-bold">Pastor's Directory List</h6>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cell#</th>
                                    <th>Email</th>
                                    <th>Station</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                $table = mysqli_query($conn, 'SELECT * FROM staff where role = "pastor" ORDER BY name ASC');
                                while ($row = mysqli_fetch_array($table))

                                ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                {; ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['cell']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td> <?php echo $row['station']; ?></td>

                                    </tr>


                                <?php } ?>
                            </tbody>
                            <table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>