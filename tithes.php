<!DOCTYPE HTML>
<html>


<head>
    <title>Deliverance Church | Tithes <?php $title ?></title>
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

    <script src="assets/DataTables/dataTables.button.min.js"> </script>

 <script src="assets/DataTables/buttons.print.min.js"> </script>
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
                <h4 class="card-title">Tithes & Offerings Directory</h4>
                <p>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="alert alert-info">
                            <strong>Verse of the Day!</strong>: But blessed are your eyes, for they see: and your ears, for they hear.- Matt: 13:16
                            <a href="#" data-dismiss="alert" class="close">×</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h6 class="card-title text-bold">Church Tithes & Offerings Lists</h6>
                                <!-- <p id="radio_date_filter">
                                    <input type="radio" name="filterTable" value="week" />This Week
                                    <input type="radio" name="filterTable" value="month" />This Month
                                </p> -->

                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $conn = mysqli_connect('localhost', 'root', '', 'project');
                                        $table = mysqli_query($conn, 'SELECT * FROM allocations ORDER BY username ASC');
                                        while ($row = mysqli_fetch_array($table))

                                        ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                        //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                        {; ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['paid']; ?></td>
                                                <td> <?php echo $row['others']; ?></td>
                                                <td> <?php echo $row['date']; ?></td>

                                            </tr>


                                        <?php } ?>
                                    </tbody>
                                </table>


                                <script>
                                    $(document).ready(function() {
                                        $('#example').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'print'
                                            ]
                                        });
                                    });

                                    $("#radio_date_filter input:radio").click(function() {


                                        var currentDate = new Date();

                                        if ($(this).val() == 'week') {

                                            var weekDate = new Date();
                                            var first = weekDate.getDate() - 7;
                                            var firstDayofWeek = new Date(weekDate.setDate(first));
                                            minDateFilter = firstDayofWeek.getTime();


                                        } else {

                                            var monthDate = new Date();
                                            var firstDayOfMonth = new Date(monthDate.setMonth(monthDate.getMonth() - 1));
                                            minDateFilter = firstDayOfMonth.getTime();

                                        }

                                        maxDateFilter = currentDate.getTime();
                                        oTable.fnDraw();
                                    });
                                </script>