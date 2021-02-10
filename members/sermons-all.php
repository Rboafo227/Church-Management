<?php include("inc/header.php");
include("inc/topnav.php");
//include("inc/member-sidebar.php");
$pagetitle = "Deliverance
         Church  | Member";
?>
<?php include("./inc/functions.php"); ?>
<?php include("inc/config.php"); ?>
<?php include("inc/db-const.php"); ?>
<center>
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title"><?php echo $pagetitle; ?></h4>
                    <p>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="alert alert-info">
                                    Welcome to our Church Management Information System: <strong>Deliverance Church</strong>. Get your account from your Pastor!
                                    <a href="#" data-dismiss="alert" class="close">×</a>
                                </div>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <h5 class="text-bold card-title">Church Sermons & Preachings</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Topic</th>
                                        <th>Preacher</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                                    $table = mysqli_query($conn, 'SELECT * FROM sermons');
                                    while ($row = mysqli_fetch_array($table))

                                    ///$row = $result->fetch_array(MYSQLI_ASSOC);

                                    //while($row = $result->fetch_array(MYSQLI_ASSOC))
                                    {
                                        $id = $row['id']; ?>
                                        <tr>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['topic']; ?></td>
                                            <td><?php echo $row['preacher']; ?></td>
                                            <td> <a href='sermon-detail.php?sermonid=4'>More Info</a> </td>

                                        </tr>


                                    <?php }
                                    echo "</table>"; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>