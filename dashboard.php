<?php include("inc/header.php");
include("inc/topnav.php");
include("inc/sidebar.php"); ?>

<body style="background: url('images/bg1.jpg')">
    <div class="content-wrapper" <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">Dashboard <small>Administration Section</small></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="widget-overview bg-primary-1">
                    <div class="inner"> <?php $conn1 = mysqli_connect('localhost', 'root', '', 'project');
                                        $result1 = mysqli_query($conn1, "SELECT COUNT(*) AS `counting` FROM `entities`");
                                        $row3 = mysqli_fetch_array($result1);
                                        $counting = $row3['counting'];
                                        ?>
                        <h2><?php echo $counting; ?></h2>
                        <p>Churches In the System</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-graph"></i>
                    </div>

                    <div class="details bg-primary-3">
                        <span>Churches<i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="widget-overview bg-info-1">
                    <div class="inner"> <?php $conn1 = mysqli_connect('localhost', 'root', '', 'project');
                                        $result1 = mysqli_query($conn1, "SELECT COUNT(*) AS `counting1` FROM `members`");
                                        $row3 = mysqli_fetch_array($result1);
                                        $counting1 = $row3['counting1'];
                                        ?>
                        <h2><?php echo $counting1; ?></h2>
                        <p>Church Members Entered</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-graph"></i>
                    </div>

                    <div class="details bg-info-3">
                        <span>Members <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="widget-overview bg-success-1">
                    <div class="inner"> <?php $conn1 = mysqli_connect('localhost', 'root', '', 'project');
                                        $result1 = mysqli_query($conn1, "SELECT COUNT(*) AS `counting2` FROM `staff` WHERE role = 'Pastor'");
                                        $row4 = mysqli_fetch_array($result1);
                                        $counting2 = $row4['counting2'];
                                        ?>
                        <h2><?php echo $counting2; ?></h2>
                        <p>Total Pastors</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-graph"></i>
                    </div>

                    <div class="details bg-success-3">
                        <span>Pastors <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="widget-overview bg-danger-1">
                    <div class="inner"> <?php $conn1 = mysqli_connect('localhost', 'root', '', 'project');
                                        $result1 = mysqli_query($conn1, "SELECT COUNT(*) AS `counting5` FROM `events`");
                                        $row2 = mysqli_fetch_array($result1);
                                        $counting5 = $row2['counting5'];
                                        ?>
                        <h2><?php echo $counting5; ?></h2>
                        <p>Total events</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-pie-graph"></i>
                    </div>

                    <div class="details bg-danger-3">
                        <span>Events <i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
</body>