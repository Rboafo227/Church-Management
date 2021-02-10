<?php include("inc/header.php");
include("inc/topnav.php");
include("inc/general-sidebar.php");
$pagetitle = "Deliverance Church | Sermons";
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
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="card-title"><?php echo $pagetitle; ?></h4>
                <p>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-info">
                                Welcome to our Church Management Information System code named: <strong>Deliverance Church</strong>. Get your account from your Pastor!
                                <a href="#" data-dismiss="alert" class="close">×</a>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="alert alert-success">
                                        <strong>Verse of the Day!</strong>
                                        <div class="dailyVersesWrapper"></div>

                                    </div>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-block">


                        <?php


                        $conn = mysqli_connect('localhost', 'root', '', 'project');
                        $id = $_GET['sermonid'];
                        $table = mysqli_query($conn, "SELECT * FROM sermons WHERE id ='$id' ");
                        while ($row = mysqli_fetch_array($table)) {
                            $date = isset($row["date"]);
                            $topic = isset($row["topic"]);
                            $sermon = isset($row["sermon"]);
                            $preacher = isset($row["preacher"]);
                            $verse = isset($row["verse"]); ?>

                            <div>
                                <div>
                                    <div>
                                        <div class="card-body" style="background:#fff;">
                                            <h2 class="card-title" style="color:#00324E !important;"><?php echo $row['topic']; ?></h2>
                                            <p class="card-text" style="font-size:18px;">
                                                <span style="margin-right:5px;"><small class="text-muted"><i class="fa fa-user" style="color:#00324E;"></i> Preacher: <?php echo $row['preacher']; ?></small></span> <br>

                                                <span style="margin-right:5px;"><small class="text-muted"><i class="fa fa-clock-o" style="color:#00324E;"></i> Date: <?php echo $row['date']; ?></small></span> <br>

                                                <span><small class="text-muted"><i class="fa fa-book" style="color:#00324E;"></i> Bible Verses: <?php echo $row['verse']; ?></small></span>
                                            </p>
                                            <p class="card-text">
                                                <?php echo $row['sermon']; ?>
                                            </p>
                                        </div>

                                    </div>
                                    <li>
                                        <?php echo "<a href='download.php?id=$id' ><i class='fa fa-edit'></i> <span>Download</span></a>" ?> </li>



                                <?php }

                                ?>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>